<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\{Category,Product};
class DatabaseSeeder extends Seeder {
 public function run():void{
  foreach (['Capas'=>'capas','Acessórios'=>'acessorios','Câmaras'=>'camaras'] as $name=>$slug) Category::firstOrCreate(['slug'=>$slug],['name'=>$name]);
  $items=[
   ['capas','Capa transparente para smartphone','Proteção elegante para o telemóvel.',12.90,25,'/images/capa.svg'],
   ['capas','Capa antichoque','Capa reforçada com boa proteção.',19.90,18,'/images/capa.svg'],
   ['acessorios','Tripé compacto','Tripé portátil para fotos e vídeo.',24.90,12,'/images/acessorios.svg'],
   ['acessorios','Cabo USB-C','Cabo resistente de carregamento.',9.90,35,'/images/acessorios.svg'],
   ['camaras','Câmara de ação 4K','Para aventuras e gravações.',129.90,8,'/images/camaras.svg'],
   ['camaras','Câmara compacta digital','Câmara para fotografia do dia a dia.',249.90,5,'/images/camaras.svg'],
  ];
  foreach($items as [$slug,$name,$description,$price,$stock,$image]){
   Product::firstOrCreate(['name'=>$name],[
    'category_id'=>Category::where('slug',$slug)->firstOrFail()->id,
    'description'=>$description,'price'=>$price,'stock'=>$stock,'image_url'=>$image
   ]);
  }
 }
}
