<?php

namespace App\Scraper;

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

use App\Models\Product;
use App\Models\Categlory;


class Wine
{

    public function scrape()
    {
        $url = 'https://www.sieuthiruoungoai.com';

        $client = new Client();

        $crawler = $client->request('GET', $url);

        $nameCateglory = $crawler->filter('ul.categories li')->each(function($node){
            return $node->text();
        });
        
        foreach ($nameCateglory as $name) {
             $categlory = new Categlory;
             $categlory->name = $name;
             $categlory->save();
             print("success!!");
         } 

    }
}