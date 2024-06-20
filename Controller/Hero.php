<?

    require_once "ApiFetcher.php";

    class Hero extends ApiFetcher

    {

        const HERO_LIST_ENDPOINT = 'https://mapi.mobilelegends.com/hero/list';
        const HERO_DETAIL_ENDPOINT = 'https://mapi.mobilelegends.com/hero/detail?id=%s';

        public function all()
        
        {
            return collect($this->get(self::HERO_LIST_ENDPOINT)->data); #self = Hace referencia a los estáticas

        }

        public function detail($id)

        {
            $endpoint = sprintf(self::HERO_DETAIL_ENDPOINT, $id);  #sprintf = Imrprime y formatea los valores almacenados
            
            $response = $this->get($endpoint);

            if (!isset($response->data->name)) {

                throw new HeroNotFoundException("Hero {$id} not found");

            }

            return $response->data;
        }

    }

?>