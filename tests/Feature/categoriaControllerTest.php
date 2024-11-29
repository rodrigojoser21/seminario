<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Categoria;


class categoriaControllerTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A basic feature test example.
     */
    /** @test */
   
    public function vistaCategoriashttp()
    {
    
        $response = $this->get('/categorias'); 
        $response->assertStatus(200);
    }

    /** @test */
    public function puede_crear_una_categoria()
    {
        $response = $this->post('/categorias', [
            'nombreCategoria' => 'Electronica',
        ]);
        $response->assertRedirect('/categorias'); 
        $this->assertDatabaseHas('categorias', [
            'nombreCategoria' => 'Electronica',
        ]);
    }

    /** @test */
public function puede_actualizar_una_categoria()
{
    
    $categoria = Categoria::factory()->create([
        'nombreCategoria' => 'Categoría Inicial',
    ]);

    
    $response = $this->put("/categorias/{$categoria->id}", [
        'nombreCategoria' => 'Categoría Actualizada',
    ]);

    
    $response->assertRedirect('/categorias');

    
    $categoria->refresh();

    
    $this->assertEquals('Categoría Actualizada', $categoria->nombreCategoria);

    
    $this->assertDatabaseHas('categorias', [
        'id' => $categoria->id,
        'nombreCategoria' => 'Categoría Actualizada',
    ]);

    
    $this->assertDatabaseMissing('categorias', [
        'id' => $categoria->id,
        'nombreCategoria' => 'Categoría Inicial',
    ]);
}

   /** @test */
   public function puede_mostrar_detalles_de_una_categoria()
   {
       $categoria = Categoria::factory()->create();
       $response = $this->get("/categorias/{$categoria->id}");
       $response->assertStatus(200); // Verifica que la solicitud fue exitosa
       $response->assertSee($categoria->nombreCategoria);
       //dd($response);
   }


   /** @test */
public function puede_eliminar_una_categoria()
{
    $categoria = Categoria::factory()->create();
    $response = $this->delete("/categorias/{$categoria->id}");
    $response->assertRedirect('/categorias');

    $this->assertSoftDeleted('categorias', [
        'id' => $categoria->id,
    ]);
}

}
