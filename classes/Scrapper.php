<?php

namespace App;

class Scrapper
{
    public $scraped_page;
    public $scraped_data;

    // this magic method scrapes the given link as the object is instantiated from this class

    public function __construct($url, $pageCount)
    {
        for ($i = 0; $i < $pageCount * 20; $i += 20) {
            $newUrl = $this->scrape_between($url, 'h', 'offset=');
            $newUrl = 'h'.$newUrl.'offset='.$i;
            $this->scraped_page = $this->curl($newUrl);
            $this->scraped_data .= $this->scrape_between($this->scraped_page, '<!--HUGAGLHUALUHGAG-->', '<!--BALGHULBALUHGBAG-->');
        }
        include 'resource/views/htmlparsescript.php';
        echo "<div id='contentTable' style='display:none'>$this->scraped_data</div>";
    }


    // standart curl function that returns data from provided url

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


    // this function is used to get the scraped data between tags or the whatever you want
    public function scrape_between($data, $start, $end)
    {
        $data = stristr($data, $start);
        $data = substr($data, strlen($start));
        $stop = stripos($data, $end);
        $data = substr($data, 0, $stop);

        return $data;
    }
}
