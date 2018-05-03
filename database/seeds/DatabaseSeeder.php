<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categories')->insert([
            'id' => 1,
            'name' => 'Cama, Mesa e Banho',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('categories')->insert([
            'id' => 2,
            'name' => 'Decoração',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('categories')->insert([
            'id' => 3,
            'name' => 'Infantil',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('categories')->insert([
            'id' => 4,
            'name' => 'Móveis',
            'created_at' => date("Y-m-d H:i:s")
        ]);



        DB::table('characteristics')->insert([
            'id' => 1,
            'name' => 'Banheiro',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('characteristics')->insert([
            'id' => 2,
            'name' => 'Cozinha',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('characteristics')->insert([
            'id' => 3,
            'name' => 'Escritório',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('characteristics')->insert([
            'id' => 4,
            'name' => 'Jardim',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('characteristics')->insert([
            'id' => 5,
            'name' => 'Quarto',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('characteristics')->insert([
            'id' => 6,
            'name' => 'Sala de Estar',
            'created_at' => date("Y-m-d H:i:s")
        ]);



        DB::table('products')->insert([
            'id' => 1,
            'name' => 'Edredom Fibra Siliconizada-Queen-240X260-Branco',
            'description' => 'Detalhes do Edredom de Fibra Siliconizada Queen 240 X 260 cm Branco<p> O <strong>Edredom</strong> é produzido em fibra siliconizada e 100% algodão, garantindo maior conforto e maciez ao usuário. Ele conta com sistema anti-ácaros e percal 233 fios. </p><p> O <strong>Edredom</strong> é fabricado pela <strong>Plumasul</strong>, empresa que há cerca de 20 anos no mercado desenvolve seus produtos com alta qualidade e matéria-prima importada rigorosamente selecionada. </p>',
            'image' => 'product1.jpg',
            'price' => 481.99,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'id' => 2,
            'name' => 'Porta-Guardanapos Cancun Bambu',
            'description' => 'O <strong>Porta-Guardanapos Cancun Bambu 18 cm</strong> com dispositivo fabricado em metal para prender os guardanapos e base fabricada em bambu, material leve e com maior resistência que possui agente natural antibacteriano.  Produto desenvolvido pela Welf, empresa sempre focada na preservação ambiental, sempre utilizando matéria-prima ecologicamente correta.',
            'image' => 'product2.jpg',
            'price' => 75.99,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'id' => 3,
            'name' => 'Painel Decorativo Anubis Retangular Freijo 150 cm',
            'description' => 'Que tal colocar o <strong>Painel Decorativo Anubis</strong> em sua casa? Lindo, né?! Você pode colocá-lo em sua sala de jantar, sala de estar ou até mesmo em seu quarto. Dependendo do cômodo, ele serve para dar a sensação de amplitude e é perfeito para dar aquela olhada na maquiagem antes de sair.<p>Perfeito, não é? Leva!</p>',
            'image' => 'product3.jpg',
            'price' => 399.99,
            'created_at' => date("Y-m-d H:i:s")
        ]);


        DB::table('characteristic_product')->insert([
            'characteristic_id' => 5,
            'product_id' => 1
        ]);

        DB::table('characteristic_product')->insert([
            'characteristic_id' => 2,
            'product_id' => 2
        ]);

        DB::table('characteristic_product')->insert([
            'characteristic_id' => 6,
            'product_id' => 2
        ]);

        DB::table('characteristic_product')->insert([
            'characteristic_id' => 3,
            'product_id' => 3
        ]);

        DB::table('characteristic_product')->insert([
            'characteristic_id' => 6,
            'product_id' => 3
        ]);


        DB::table('category_product')->insert([
            'category_id' => 1,
            'product_id' => 1
        ]);

        DB::table('category_product')->insert([
            'category_id' => 1,
            'product_id' => 2
        ]);

        DB::table('category_product')->insert([
            'category_id' => 2,
            'product_id' => 3
        ]);

        DB::table('category_product')->insert([
            'category_id' => 4,
            'product_id' => 3
        ]);
    }
}
