<?php

namespace App;

class Scrapper
{

    public $scraped_page;
    public $scraped_data;

    public function __construct($url)
    {
           $this->scraped_page = $this->curl($url);
           $this->scraped_data = $this->scrape_between($this->scraped_page, '<!--HUGAGLHUALUHGAG-->', '<!--BALGHULBALUHGBAG-->');
           echo "<div style='display:none'>$this->scraped_data</div>";
    }



  public function curl($url)
  {
      $options = array(
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_AUTOREFERER => true,
          CURLOPT_CONNECTTIMEOUT => 120,
          CURLOPT_TIMEOUT => 120,
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_USERAGENT => 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.1a2pre) Gecko/2008073000 Shredder/3.0a2pre ThunderBrowse/3.2.1.8',
          CURLOPT_URL => $url,
      );

      $chandle = curl_init();
      curl_setopt_array($chandle, $options);
      $data = curl_exec($chandle);
      curl_close($chandle);

      return $data;
  }

     public function scrape_between($data, $start, $end)
     {
         $data = stristr($data, $start);
         $data = substr($data, strlen($start));
         $stop = stripos($data, $end);
         $data = substr($data, 0, $stop);

         return $data;
     }


}
