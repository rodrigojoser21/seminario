<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Producto;
use App\Models\Categoria; 

class productoControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    /** @test */
    public function vistaProductoshttp()
    {
    
        $response = $this->get('/productos'); 
        $response->assertStatus(200);
    }

    /** @test */
    public function puede_crear_un_producto()
    {
        $response = $this->post('/productos', [
            'nombre' => 'Celular',
            'descripcion' => 'dafsdf',
            'precio' => '10000',
            'stock' => '10',
            'idCategoria' => '1',
        ]);
        $response->assertRedirect('/productos'); 
        $this->assertDatabaseHas('productos', [
            'nombre' => 'Celular',
            'descripcion' => 'dafsdf',
            'precio' => '10000',
            'stock' => '10',
            'idCategoria' => '1',
        ]);
    }


    /** @test */
public function puede_actualizar_un_producto()
{
    
    $categoria = Categoria::factory()->create();
    $producto = Producto::factory()->create([
        'nombre' => 'Producto Inicial',
        'descripcion' => 'Descripción inicial',
        'precio' => 100.00,
        'stock' => 20,
        'idCategoria' => $categoria->id,
    ]);

   
    $response = $this->put("/productos/{$producto->id}", [
        'nombre' => 'Producto Actualizado',
        'descripcion' => 'Descripción actualizada',
        'precio' => 200.00,
        'stock' => 30,
        'idCategoria' => $categoria->id, 
    ]);

    
    $response->assertRedirect('/productos');

    
    $this->assertDatabaseHas('productos', [
        'id' => $producto->id,
        'nombre' => 'Producto Actualizado',
        'descripcion' => 'Descripción actualizada',
        'precio' => 200.00,
        'stock' => 30,
        'idCategoria' => $categoria->id,
    ]);

    
    $this->assertDatabaseMissing('productos', [
        'id' => $producto->id,
        'nombre' => 'Producto Inicial',
        'descripcion' => 'Descripción inicial',
        'precio' => 100.00,
        'stock' => 20,
    ]);
}

 /** @test */
 public function puede_mostrar_detalles_de_un_producto()
    {
        
        $categoria = Categoria::factory()->create();

        
        $producto = Producto::factory()->create([
            'idCategoria' => $categoria->id,
        ]);

        
        $response = $this->get("/productos/{$producto->id}");
        $response->assertStatus(200); // Verifica que la solicitud fue exitosa
        $response->assertSee($producto->nombre);
        $response->assertSee($producto->precio);
        $response->assertSee($producto->descripcion);
        $response->assertSee($producto->stock);
        $response->assertSee($producto->idCategoria);
        //dd($response);
 }


 
 /** @test */
public function puede_eliminar_un_producto()
{
    $producto = Producto::factory()->create();
    $response = $this->delete("/productos/{$producto->id}");
    $response->assertRedirect('/productos');

    $this->assertSoftDeleted('productos', [
        'id' => $producto->id,
    ]);
}
}
