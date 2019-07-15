<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pages')->delete();
        
        \DB::table('pages')->insert([
            [
                'title' => 'About Us',
                'slug' => 'about-us',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse lacinia, nunc at
                 pellentesque hendrerit, diam nibh porta augue, ut faucibus libero lorem a orci. Nullam fringilla tempus 
                 nisl ut ultricies. Integer non orci lobortis, commodo mi vel, fringilla risus. Aliquam ornare vestibulum 
                 magna, a vehicula augue consectetur at. Nulla facilisi. Proin aliquet lorem quis pellentesque laoreet. 
                 Duis nec ex vitae lacus bibendum iaculis eget mollis urna. Vestibulum vel mauris non eros auctor iaculis. 
                 In dictum auctor lorem, ut suscipit arcu lacinia a. Suspendisse potenti. Vestibulum gravida orci eget 
                 libero condimentum pellentesque.'
            ],
            [
                'title' => 'Contact Us',
                'slug' => 'contact-us',
                'content' => ' Suspendisse lacinia, nunc at
                 pellentesque hendrerit, diam nibh porta augue, ut faucibus libero lorem a orci. Nullam fringilla tempus 
                 nisl ut ultricies. Integer non orci lobortis, commodo mi vel, fringilla risus. Aliquam ornare vestibulum 
                 magna, a vehicula augue consectetur at. Nulla facilisi. Proin aliquet lorem quis pellentesque laoreet. 
                 Duis nec ex vitae lacus bibendum iaculis eget mollis urna. Vestibulum vel mauris non eros auctor iaculis. 
                 In dictum auctor lorem, ut suscipit arcu lacinia a. Suspendisse potenti. Vestibulum gravida orci eget 
                 libero condimentum pellentesque.'
            ],
            [
                'title' => 'Privacy',
                'slug' => 'privacy',
                'content' => ' Hendrerit, diam nibh porta augue, ut faucibus libero lorem a orci. Nullam fringilla tempus 
                 nisl ut ultricies. Integer non orci lobortis, commodo mi vel, fringilla risus. Aliquam ornare vestibulum 
                 magna, a vehicula augue consectetur at. Nulla facilisi. Proin aliquet lorem quis pellentesque laoreet. 
                 Duis nec ex vitae lacus bibendum iaculis eget mollis urna. Vestibulum vel mauris non eros auctor iaculis. 
                 In dictum auctor lorem, ut suscipit arcu lacinia a. Suspendisse potenti. Vestibulum gravida orci eget 
                 libero condimentum pellentesque.'
            ],
            [
                'title' => 'Terms And Conditions',
                'slug' => 'terms-and-conditions',
                'content' => ' Aut faucibus libero lorem a orci. Nullam fringilla tempus 
                 nisl ut ultricies. Integer non orci lobortis, commodo mi vel, fringilla risus. Aliquam ornare vestibulum 
                 magna, a vehicula augue consectetur at. Nulla facilisi. Proin aliquet lorem quis pellentesque laoreet. 
                 Duis nec ex vitae lacus bibendum iaculis eget mollis urna. Vestibulum vel mauris non eros auctor iaculis. 
                 In dictum auctor lorem, ut suscipit arcu lacinia a. Suspendisse potenti. Vestibulum gravida orci eget 
                 libero condimentum pellentesque.'
            ],
            [
                'title' => 'Security Tips',
                'slug' => 'security-tips',
                'content' => 'Faucibus libero lorem a orci. Nullam fringilla tempus 
                 nisl ut ultricies. Integer non orci lobortis, commodo mi vel, fringilla risus. Aliquam ornare vestibulum 
                 magna, a vehicula augue consectetur at. Nulla facilisi. Proin aliquet lorem quis pellentesque laoreet. 
                 Duis nec ex vitae lacus bibendum iaculis eget mollis urna. Vestibulum vel mauris non eros auctor iaculis. 
                 In dictum auctor lorem, ut suscipit arcu lacinia a. Suspendisse potenti. Vestibulum gravida orci eget 
                 libero condimentum pellentesque.'
            ],
        ]);
        
        
    }
}