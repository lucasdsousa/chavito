<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChavitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* DB::table('chavitos')->insert([
            'image_name' => 'images/1-IMG_8631.jpg',
            'title' => 'Chavito Dia Especial',
            'descricao' => 'Marque no calendário uma data que jamais deve ser esquecida.',
            'categoriaID' => 1,
            'valor' => 20.00,
            'slug' => 'chavito-dia-especial'
        ]); */
        DB::table('chavitos')->insert([
            'image_name' => 'images/2-IMG_8632.jpg',
            'title' => 'Chavito Meu Carro',
            'descricao' => 'Você pode personalizar esse chaveiro com a foto do seu veículo e escolher uma imagem para o pingente menor. ',
            'categoriaID' => 1,
            'valor' => 30.00,
            'slug' => 'chavito-duplo'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/3-IMG_8633.jpg',
            'title' => 'Chavito Metal',
            'descricao' => 'Essa encomenda é a junção de três chaveiros em um, você pode personalizar as imagens, cores e informações como desejar. ',
            'categoriaID' => 1,
            'valor' => 38.00,
            'slug' => 'chavito-metal'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/4-IMG_8634.jpg',
            'title' => 'Chavito Pilote Com Cuidado',
            'descricao' => 'Essa encomenda é a junção de três  chaveiros em um só, aqui você pode personalizar a frase, me enviar uma foto do capacete e moto que você desejar. ',
            'categoriaID' => 1,
            'valor' => 38.00,
            'slug' => 'chavito-cuidado'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/5-IMG_8635.jpg',
            'title' => 'Chavito Nome',
            'descricao' => 'Aqui você pode personalizar a cor e nome que deseja no chaveiro.',
            'categoriaID' => 1,
            'valor' => 22.00,
            'slug' => 'chavito-marca'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/6-IMG_8637.jpg',
            'title' => 'Chavito Meu Bebê',
            'descricao' => 'Você vai personalizar esse chaveiro com as informações do seu bebê, vou precisar saber o nome, data, o peso, horário e cidade que nasceu. ',
            'categoriaID' => 1,
            'valor' => 22.00,
            'slug' => 'chavito-nascimento'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/7-IMG_8638.jpg',
            'title' => 'Chavito Contornado',
            'descricao' => 'Aqui o chaveiro vai sair no formato contornado da imagem que você me enviar.',
            'categoriaID' => 1,
            'valor' => 22.00,
            'slug' => 'chavito-anime'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/8-IMG_8639.jpg',
            'title' => 'Chavito Minha Casa',
            'descricao' => 'Nesse chaveiro você pode escolher a frase, cor e imagem que desejar. ',
            'categoriaID' => 1,
            'valor' => 30.00,
            'slug' => 'chavito-casa'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/9-IMG_8642.jpg',
            'title' => 'Chavito Que se Completa',
            'descricao' => 'Nesse chaveiro você vai me informar uma data especial e as inicias do casal.',
            'categoriaID' => 1,
            'valor' => 44.00,
            'slug' => 'chavito-dia-especial'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/10-IMG_8644.jpg',
            'title' => 'Chavito Claquete',
            'descricao' => 'Aqui você vai personalizar a data e o nome do casal para ficar no formato de claquete.',
            'categoriaID' => 1,
            'valor' => 22.00,
            'slug' => 'chavito-dia-especial'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/11-IMG_8645.jpg',
            'title' => 'Chavito Casa',
            'descricao' => 'Nesse chaveiro em formato de casa você pode editar a frase e cor que deseja encontrar.',
            'categoriaID' => 1,
            'valor' => 22.00,
            'slug' => 'chavito-casa'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/12-IMG_8646.jpg',
            'title' => 'Chavito Tatuador',
            'descricao' => 'Esse chaveiros é perfeito para personalizar com o nome que deseja.',
            'categoriaID' => 1,
            'valor' => 30.00,
            'slug' => 'chavito-tattoo'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/13-IMG_8648.jpg',
            'title' => 'Chavito Quebra-Cabeça',
            'descricao' => 'Você pode personalizar esse chaveiro com uma data especial, as informações do casal ou uma frase que se completa.',
            'categoriaID' => 1,
            'valor' => 44.00,
            'slug' => 'chavito-Puzzle'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/14-IMG_8649.jpg',
            'title' => 'Chavito Pix',
            'descricao' => 'Nesse chavito você pode me enviar o qr code seu pix e as informações necessárias.',
            'categoriaID' => 1,
            'valor' => 22.00,
            'slug' => 'chavito-pix'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/15-IMG_8650.jpg',
            'title' => 'Chavito Foto Contornada',
            'descricao' => 'Você me envia a sua foto favorita é vamos seguir o contorno perfeito.',
            'categoriaID' => 1,
            'valor' => 22.00,
            'slug' => 'chavito-namorados'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/16-IMG_8651.jpg',
            'title' => 'Chavito Por Onde For',
            'descricao' => 'Esse chaveiro de se completar pode ser personalizado com uma frase perfeita que se completam ao se encontrar.',
            'categoriaID' => 1,
            'valor' => 44.00,
            'slug' => 'chavito-par'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/17-IMG_8653.jpg',
            'title' => 'Chavito Amor de Mãe',
            'descricao' => 'Aqui você pode personalizar com o nome do seu bebê.',
            'categoriaID' => 1,
            'valor' => 22.00,
            'slug' => 'chavito-amor-mae'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/18-IMG_8654.jpg',
            'title' => 'Chavito Polaroid',
            'descricao' => 'Aqui você pode personalizar com uma foto é uma frase importante.',
            'categoriaID' => 1,
            'valor' => 22.00,
            'slug' => 'chavito-namorados'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/19-IMG_8657.jpg',
            'title' => 'Chavito Nossa Música',
            'descricao' => 'Aqui você precisa me enviar sua foto e link da música (ou playlist) favorita.',
            'categoriaID' => 1,
            'valor' => 22.00,
            'slug' => 'chavito-spotify'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/20-IMG_8662.jpg',
            'title' => 'Chavito Meu Dia',
            'descricao' => 'Aqui você pode personalizar com a data de nascimento do seu bebê ',
            'categoriaID' => 1,
            'valor' => 30.00,
            'slug' => 'chavito-dia-especial'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/21-IMG_8664.jpg',
            'title' => 'Chavito Metal',
            'descricao' => 'Essa encomenda é a junção de três chaveiros em um, você pode personalizar as imagens, cores e informações como desejar.',
            'categoriaID' => 1,
            'valor' => 33.00,
            'slug' => 'chavito-metal'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/22-IMG_8666.jpg',
            'title' => 'Chavito Nome',
            'descricao' => 'Aqui você pode personalizar a cor e nome que deseja no chaveiro.',
            'categoriaID' => 1,
            'valor' => 22.00,
            'slug' => 'chavito-nome'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/23-IMG_8667.jpg',
            'title' => 'Chavito Musical',
            'descricao' => 'Esse chaveiro vai ter sua música ou playlist favorita.',
            'categoriaID' => 1,
            'valor' => 22.00,
            'slug' => 'chavito-spotify'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/24-IMG_8675.jpg',
            'title' => 'Chavito Frase',
            'descricao' => 'Aqui você pode escolher a frase e cor que deseja encontrar no seu chaveiro.',
            'categoriaID' => 1,
            'valor' => 22.00,
            'slug' => 'chavito-frase'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/25-IMG_8676-2.jpg',
            'title' => 'Chavito Cuidado com Quem Ama',
            'descricao' => 'Aqui você pode personalizar com uma frase, foto e nome do casal.',
            'categoriaID' => 1,
            'valor' => 30.00,
            'slug' => 'chavito-duplo'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/26-IMG_8677.jpg',
            'title' => 'Chavito Nome',
            'descricao' => 'Esse chaveiro você vai personalizar com seu nome, inicial e você pode escolher a cor também.',
            'categoriaID' => 1,
            'valor' => 30.00,
            'slug' => 'chavito-nome'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/27-IMG_8678.jpg',
            'title' => 'Chavito Mimoji',
            'descricao' => 'Você vai precisar montar seu personagem e me enviar, você poder usar o aplicativo mimoji, Bitmoji, Dolify ou outros.',
            'categoriaID' => 1,
            'valor' => 22.00,
            'slug' => 'chavito-emoji'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/28-IMG_8679.jpg',
            'title' => 'Chavito Musical com Verso',
            'descricao' => 'Aqui você pode personalizar com sua foto e música favorita e acrescentar uma frase especial para por no verso.',
            'categoriaID' => 1,
            'valor' => 25.00,
            'slug' => 'chavito-spotify'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/29-IMG_8680.jpg',
            'title' => 'Chavito Calendário Coração',
            'descricao' => 'Esse chaveiro em formato de coração você pode personalizar a cor e data que desejar.',
            'categoriaID' => 1,
            'valor' => 22.00,
            'slug' => 'chavito-dia-especial'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/30-IMG_8682.jpg',
            'title' => 'Chavito Spotify',
            'descricao' => 'Você vai precisar me enviar o link da música ou playlist que deseja encontrar em seu chaveiro.',
            'categoriaID' => 1,
            'valor' => 22.00,
            'slug' => 'chavito-spotify'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/31-IMG_8684.jpg',
            'title' => 'Chavito Placa Mercosul',
            'descricao' => 'Aqui você pode personalizar com uma data importante, nome e escolher uma frase para o verso.',
            'categoriaID' => 1,
            'valor' => 25.00,
            'slug' => 'chavito-placa'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/33-IMG_8686.jpg',
            'title' => 'Chavito Cat',
            'descricao' => 'Aqui você pode escolher a cor e personalizar com as informações do seu gatinho como o nome, seu endereço e contanto.',
            'categoriaID' => 3,
            'valor' => 25.00,
            'slug' => 'chavito-pet'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/32-IMG_8685.jpg',
            'title' => 'Chavito Cat',
            'descricao' => 'Aqui você pode escolher a cor e personalizar com as informações do seu gatinho como o nome, seu endereço e contanto.',
            'categoriaID' => 3,
            'valor' => 25.00,
            'slug' => 'chavito-pet'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/34-IMG_8688.jpg',
            'title' => 'Chavito Nome',
            'descricao' => 'Aqui você vai personalizar um chaveiro com seu nome e cor que desejar.',
            'categoriaID' => 1,
            'valor' => 22.00,
            'slug' => 'chavito-nome'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/35-IMG_8692.jpg',
            'title' => 'Chavito Barbeiro',
            'descricao' => 'Esse chaveiro você vai me enviar o seu nome ou logo da barbearia.',
            'categoriaID' => 1,
            'valor' => 30.00,
            'slug' => 'chavito-barber'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/36-IMG_8693.jpg',
            'title' => 'Chavito Dia Especial',
            'descricao' => 'Você pode personalizar a cor e a data de um dia especial.',
            'categoriaID' => 1,
            'valor' => 22.00,
            'slug' => 'chavito-dia-especial'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/37-IMG_8694.jpg',
            'title' => 'Chavito Dog',
            'descricao' => 'Esse pingente é para seu cachorro e precisa ter informações como nome, local e telefone para contato.',
            'categoriaID' => 3,
            'valor' => 25.00,
            'slug' => 'chavito-pet'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/38-IMG_8696.jpg',
            'title' => 'Chavito 360°',
            'descricao' => 'Esse chaveiro em metal é giratório e pode ter uma informação na frente e no verso.',
            'categoriaID' => 1,
            'valor' => 25.00,
            'slug' => 'chavito-metal'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/39-IMG_8699.jpg',
            'title' => 'Acrypin',
            'descricao' => 'São pins feitos em acrílico totalmente personalizados.',
            'categoriaID' => 2,
            'valor' => 15.00,
            'slug' => 'acrypin'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/40-IMG_8703.jpg',
            'title' => 'Chavito Completude',
            'descricao' => 'As mais belas lembranças e sentimentos.',
            'categoriaID' => 1,
            'valor' => 44.00,
            'slug' => 'chavito-par'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/41-IMG_8705.jpg',
            'title' => 'Placa Especial',
            'descricao' => 'As mais belas lembranças e sentimentos.',
            'categoriaID' => 5,
            'valor' => 50.00,
            'slug' => 'placa-especial'
        ]);
        DB::table('chavitos')->insert([
            'image_name' => 'images/42-IMG_8706.jpg',
            'title' => 'Placa Spotify',
            'descricao' => 'As mais belas lembranças e sentimentos.',
            'categoriaID' => 5,
            'valor' => 50.00,
            'slug' => 'chavito-namorados'
        ]);
    }
}
