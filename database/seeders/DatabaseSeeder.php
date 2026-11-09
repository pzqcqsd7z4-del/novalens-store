<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\{Category,Product};
class DatabaseSeeder extends Seeder {
 public function run():void {
  foreach ([
   'Capas'=>'capas','Acessórios'=>'acessorios','Câmaras'=>'camaras',
   'Áudio'=>'audio','Gaming'=>'gaming','Carregamento'=>'carregamento',
   'Armazenamento'=>'armazenamento','Computadores'=>'computadores'
  ] as $name=>$slug){Category::firstOrCreate(['slug'=>$slug],['name'=>$name]);}
  $items=[
   ['capas','Capa transparente para smartphone','Capa transparente para proteger o telemóvel.',12.90,25,'capa'],
   ['capas','Capa antichoque','Proteção reforçada para o dia a dia.',19.90,18,'capa'],
   ['capas','Película de vidro temperado','Proteção adicional contra riscos no ecrã.',7.90,40,'capa'],
   ['capas','Capa silicone soft touch','Capa suave e confortável para smartphone.',14.90,25,'capa'],
   ['acessorios','Tripé compacto','Tripé portátil para fotografia e vídeo.',24.90,12,'acessorios'],
   ['acessorios','Cabo USB-C','Cabo resistente de carregamento.',9.90,35,'carregamento'],
   ['acessorios','Suporte de telemóvel para carro','Suporte ajustável para o automóvel.',15.90,20,'acessorios'],
   ['acessorios','Suporte articulado para monitor','Suporte ajustável para a secretária.',44.90,10,'computadores'],
   ['camaras','Câmara de ação 4K','Câmara para aventuras e gravações.',129.90,8,'camaras'],
   ['camaras','Câmara compacta digital','Câmara de fotografia do dia a dia.',249.90,5,'camaras'],
   ['camaras','Webcam Full HD 1080p','Webcam para aulas, trabalho e streaming.',39.90,16,'camaras'],
   ['camaras','Kit de iluminação LED','Luz LED para vídeo e fotografia.',34.90,15,'camaras'],
   ['audio','Fones Bluetooth sem fios','Auriculares sem fios com estojo de carregamento.',29.90,30,'audio'],
   ['audio','Headset gaming com microfone','Headset para chamadas e jogos.',49.90,18,'audio'],
   ['audio','Auscultadores com cancelamento de ruído','Auscultadores confortáveis para ouvir música.',79.90,12,'audio'],
   ['audio','Coluna Bluetooth portátil','Coluna compacta sem fios.',34.90,22,'audio'],
   ['audio','Microfone USB para streaming','Microfone de secretária para gravação e reuniões.',59.90,10,'audio'],
   ['gaming','Rato gaming RGB','Rato com iluminação RGB e sensor ajustável.',24.90,25,'gaming'],
   ['gaming','Teclado mecânico RGB','Teclado gaming com iluminação personalizável.',69.90,14,'gaming'],
   ['gaming','Tapete de rato XL','Tapete de rato de grandes dimensões.',16.90,29,'gaming'],
   ['gaming','Comando sem fios para PC','Comando compatível com jogos em PC.',39.90,14,'gaming'],
   ['carregamento','Carregador USB-C 30W','Adaptador de carregamento USB-C.',18.90,32,'carregamento'],
   ['carregamento','Powerbank 10000 mAh','Bateria portátil para carregar dispositivos.',29.90,20,'carregamento'],
   ['carregamento','Carregador sem fios','Base de carregamento sem fios compatível.',21.90,20,'carregamento'],
   ['carregamento','Cabo USB-C para USB-C 2m','Cabo USB-C com dois metros de comprimento.',12.90,35,'carregamento'],
   ['armazenamento','Pen USB 64 GB','Unidade USB para guardar e transportar ficheiros.',12.90,40,'armazenamento'],
   ['armazenamento','SSD externo 500 GB','Armazenamento portátil de alta velocidade.',69.90,16,'armazenamento'],
   ['armazenamento','Cartão microSD 128 GB','Armazenamento para equipamentos compatíveis.',19.90,26,'armazenamento'],
   ['computadores','Hub USB-C 6 em 1','Adaptador USB-C com várias ligações.',32.90,15,'computadores'],
   ['computadores','Base de refrigeração portátil','Base ventilada para computador portátil.',27.90,15,'computadores'],
   ['computadores','Monitor 24 polegadas Full HD','Monitor Full HD para estudo e trabalho.',119.90,8,'computadores'],
   ['computadores','Rato sem fios ergonómico','Rato para trabalho e utilização diária.',22.90,18,'computadores'],
  ];
  foreach($items as [$slug,$name,$description,$price,$stock,$image]){
   Product::firstOrCreate(['name'=>$name],[
    'category_id'=>Category::where('slug',$slug)->firstOrFail()->id,
    'description'=>$description,'price'=>$price,'stock'=>$stock,
    'image_url'=>'/images/'.$image.'.svg',
   ]);
  }
 }
}