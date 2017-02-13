<?php
/**
 * Created by PhpStorm.
 * Author : Aung Ko Khant
 * Date: Feb/01/2017
 * Time: 11:32 AM
 */

use Illuminate\Database\Seeder;
class Default_PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    DB::table('posts')->delete();

    $objs = array(
        ['id'=>1, 'name'=>'Local Information','description'=>'Local Information',
            'content' =>'<h3 style="text-align: justify; " open="" sans="" condensed",="" sans-serif;="" font-weight:="" 600;="" color:="" rgb(0,="" 0,="" 0);="" font-size:="" 14pt;"="">Local Information</h3><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-weight: 700;"><span style="font-family: Zawgyi-One, sans-serif;">Myanmar</span></span><b><span style="font-family: Zawgyi-One, sans-serif;"><br></span></b><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal"><div style="text-align: justify;"><font face="Zawgyi-One, sans-serif"><br></font></div><span style="font-family: Zawgyi-One, sans-serif;"><div style="text-align: justify;">Myanmar (formerly Burma) is a Southeast Asian nation of more than 100 ethnic
groups, bordering India, Bangladesh, China, Laos and Thailand. Myanmar is the
second largest country (about the size of France) in Southeast Asian and has a
population of 52 millions. Yangon (formerly Rangoon), the country\'s largest
city, is home to bustling markets, numerous parks and lakes, and the towering,
gilded Shwedagon Pagoda, which contains Buddhist relics and dates to the 6th
century.</div><div style="text-align: justify;">Other important Buddhist sites include the ancient city of Bagan, studded with
more than 2,000 temples and pagodas, and Kyaiktiyo Pagoda, perched atop a rock
at the edge of a steep hillside. Cruises along Burma’s Irrawaddy River take in
historic landmarks, such as the 19th-century Mandalay Palace, and rural
scenery. Visitors in motorboats and fishermen propelling skiffs cross Inle
Lake, which is lined with villages on stilts and colorful markets. Along
Burma\'s Bay of Bengal coast, Ngapali is a palm-lined, upscale beach resort
area.</div></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:="" "times="" new="" roman""=""><o:p>&nbsp;</o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: normal;"><b><span style="font-family: Zawgyi-One, sans-serif; color: rgb(1, 1, 1); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">Currency
</span></b><span style="font-family: Zawgyi-One, sans-serif; color: rgb(1, 1, 1); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">The Myanmar Kyat, indicated
as MMK is the currency of Myanmar. Notes are in denominations of Kyats 10000,
5000, 1000, 500, 200, 100 and 50. Upon arrival at the airport, you will be able
to find money changers.</span><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: normal;"><b><span style="font-family: Zawgyi-One, sans-serif; color: rgb(1, 1, 1); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">Credit
Card </span></b><span style="font-family: Zawgyi-One, sans-serif; color: rgb(1, 1, 1); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">Credit Cards are only
accepted at major hotels, airlines and some international shops and
restaurants. Usually a fee is charged for credit card transactions. You are
recommended to bring adequate cash.</span><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: normal;"><b><span style="font-family: Zawgyi-One, sans-serif; color: rgb(1, 1, 1); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">About
Yangon</span></b><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:="" "times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: normal;"><b><span style="font-family: Zawgyi-One, sans-serif; color: rgb(1, 1, 1); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">History</span></b><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">King
Alaungpaya founded Yangon in AD 1755 from Mon. He renamed Yangon from Dagon (it
means ends of Strife). Dagon was a small fishing village centered about
Shwedagon Pagoda and was built by King Okkalapa. King Alaungpaya extended his
empire like Thanlyin to Yangon to prevent from Filipe de Brito e Nicote (a) Nga
Zinga, Portuguese adventurer and mercenary. </span><span style="font-family:
" zawgyi-one","sans-serif";mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">In
colonies period, Yangon had transformed into the commercial and political hub
of British Burma. Yangon was chosen as capital of Myanmar (Burma). The British
renamed Rangoon from Yangon. Yangon has the largest number of colonial
buildings, architecture, offices, churches, mosques, and temples.</span><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">At the
time of colonies period, there is less people of Myanmar (Burma). There are a
lot of Indian, Chinese, and some are the British people in Yangon. After
independence in 1948, although the British brought back Indian, there are still
left Indian in Yangon. After 1966, Myanmar government holds closed policy and
many Indian and Chinese went back their origin countries. Nowadays, Yangon has
lots of Myanmar (Burma) in Yangon.</span><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: normal;"><b><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">Sightseeing
in Yangon</span></b><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">The
central of the town is Sule Pagoda; the roads are face to pagoda. Myanmar is
independent religious country, Immanuel Baptist Church and Jama Aasjid Mosque
are allowed to construct near around Sule Pagoda. Among those, there are city
hall, Mahabandola Garden, the Supreme Court and other colonial buildings. </span><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">Along
the Strand Road, the visitors can start from Botahtaung Pagoda. The Strand
Hotel (five star hotels) was built by the British and it is over 100 years
long. The visitors can feel the taste of colonial by drinking coffee or tea.
The other side of the Strand Hotel is Nan Thi Tar port. The view from the
Strand Hotel is very attractive. The other side of Yangon River is Dala and the
visitors can take ferry and the view from Dala is the whole panoramic of
Yangon. It is the amazing view. Kheng Hock Chinese Temple is also on Strand
Road.</span><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:="" "times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">Along
the Merchant Road, Anawrahta Road, Mahabandola Road, the visitors can see the
colonial buildings and architecture, many crowded food shops, clinics, medical
stores, electronic shops camera shops, glass shops, china town and other
religious buildings </span><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">Along
the Bogyoke Road, can view St.Mary’s Catholic, was built in 1899, Yangon Train
Station, the cinemas, Bogyoke Market, Yangon General Hospital built by the
British.</span><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:="" "times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">There
are a lot of golden pagodas like Shwe Dagon Pagoda, Sule Pagoda, Chauk Htatgyi
Pagoda and other attractions like museum, parks, lake, Yangon Zoological
Garden, Golf Clubs and many other interesting places.</span><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: normal;"><b><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">Main
Attractions in Yangon</span></b><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">1)
Shwedagon Pagoda</span><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">2) Sule
Pagoda &amp; Downtown Yangon</span><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">3)
Chauk Htatgyi Pagoda</span><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">4)
Thirimingalar Kaba Aye Pagoda</span><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">5) Maha
Pasana Gula</span><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">6)
National Museum</span><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">7)
Souvenir and Gift Shops &amp; Painting Glory</span><span style="font-family:
" zawgyi-one","sans-serif";mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">8)
Jewelry Shops </span><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">9)
Bogyoke Market</span><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p>



















































</p><p class="MsoNormal" style="text-align: justify; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">10)
China Town</span><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:="" "times="" new="" roman""=""><o:p></o:p></span></p>',
            'status' =>'active', 'url' =>'other/local_information', 'title' =>'Local Information', 'post_order' =>1, 'pages_id' =>16, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],

        ['id'=>2, 'name'=>'VISA Information','description'=>'VISA Information',
            'content' =>'<h3 style="text-align: justify; " open="" sans="" condensed",="" sans-serif;="" font-weight:="" 600;="" color:="" rgb(0,="" 0,="" 0);="" font-size:="" 14pt;"="">Visa Information</h3><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif;">Most nationalities require a visa to visit
Myanmar. Passport holders from Brunei, Cambodia, Indonesia, Laos, Philippines,
Singapore and Vietnam do not require a visa to enter Myanmar for visit up to 14
days. The &nbsp;current &nbsp;regulations for &nbsp;entering &nbsp;Myanmar are
&nbsp;as following:</span><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:="" "times="" new="" roman""=""><o:p>&nbsp;</o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif;">1. &nbsp;Individual &nbsp;visa &nbsp;&nbsp;</span><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif;">This &nbsp;visa &nbsp;is &nbsp;issued &nbsp;by
&nbsp;a &nbsp;Myanmar &nbsp;Embassy &nbsp;or &nbsp;Consulate. &nbsp;An invitation
&nbsp;letter &nbsp;is &nbsp;not &nbsp;mandatory, &nbsp;and &nbsp;it usually
&nbsp;takes &nbsp;3-5 &nbsp;working &nbsp;days &nbsp;to &nbsp;issue &nbsp;this
&nbsp;visa. &nbsp;Visas issued &nbsp;at &nbsp;Myanmar &nbsp;Embassies &nbsp;are
&nbsp;$20.</span><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:="" "times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:="" "times="" new="" roman""=""><o:p>&nbsp;</o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif;">2. &nbsp;Package &nbsp;Tour &nbsp;visa </span><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif;">This &nbsp;visa &nbsp;is &nbsp;issued &nbsp;by
&nbsp;a &nbsp;Myanmar &nbsp;Embassy &nbsp;or &nbsp;Consulate.
&nbsp;&nbsp;&nbsp;It &nbsp;usually &nbsp;takes &nbsp;3-5 &nbsp;days &nbsp;to
&nbsp;issue &nbsp;the &nbsp;visa. </span><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:="" "times="" new="" roman""=""><o:p>&nbsp;</o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif;">3. &nbsp;E-Visa </span><span style="font-family:
" zawgyi-one","sans-serif";mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif;">Myanmar’s e-visa &nbsp;online &nbsp;system
&nbsp;is &nbsp;now &nbsp;available. &nbsp;&nbsp;</span><span style="font-family:
" zawgyi-one","sans-serif";mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif;">- Arrival allowed &nbsp;at &nbsp;Yangon,
&nbsp;Mandalay &nbsp;and &nbsp;Nay &nbsp;Pyi &nbsp;Taw &nbsp;international
&nbsp;airports </span><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif;">- Cost: &nbsp;USD &nbsp;$50 &nbsp;non-refundable
paid &nbsp;during &nbsp;application &nbsp;submission. &nbsp;&nbsp;Visa and
&nbsp;MasterCard accepted </span><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif;">- Valid &nbsp;for &nbsp;28 &nbsp;days in
&nbsp;country, single-entry. &nbsp;Travelers &nbsp;must &nbsp;arrive &nbsp;in
&nbsp;Myanmar &nbsp;within &nbsp;90 &nbsp;days &nbsp;of issue &nbsp;date. </span><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif;">- Approval letter &nbsp;will &nbsp;be &nbsp;sent
&nbsp;within &nbsp;five &nbsp;working &nbsp;days. &nbsp;&nbsp;&nbsp;This letter
&nbsp;needs to &nbsp;be &nbsp;printed &nbsp;to &nbsp;allow boarding &nbsp;of
&nbsp;your &nbsp;international flight. &nbsp;&nbsp;Upon &nbsp;arrival, please
&nbsp;go &nbsp;straight &nbsp;to &nbsp;the &nbsp;immigration counter.
&nbsp;&nbsp;No &nbsp;passport &nbsp;photo &nbsp;needed. </span><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif;">- Children under &nbsp;age &nbsp;of &nbsp;7
&nbsp;holding &nbsp;their own passports &nbsp;are &nbsp;required &nbsp;to
&nbsp;apply &nbsp;eVisa separately &nbsp;and pay &nbsp;USD &nbsp;50 &nbsp;for
the &nbsp;eVisa. If &nbsp;your &nbsp;child &nbsp;is &nbsp;under &nbsp;7
&nbsp;and &nbsp;is &nbsp;listed &nbsp;in parent/guardian &nbsp;passport
&nbsp;and accompanying &nbsp;the &nbsp;trip, please &nbsp;fill up &nbsp;the
&nbsp;minor information &nbsp;included in &nbsp;eVisa application &nbsp;form. </span><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif;">- Applications can &nbsp;be &nbsp;submitted
&nbsp;at &nbsp;http://evisa.moip.gov.mm/. &nbsp;&nbsp;</span><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:="" "times="" new="" roman""=""><o:p>&nbsp;</o:p></span></p><p style="text-align: justify;">





































<span style="font-size: 11pt; line-height: 107%; font-family: Zawgyi-One, sans-serif;">Please &nbsp;contact
&nbsp;your travel consultant for &nbsp;additional information. &nbsp; &nbsp;</span><br></p>',
            'status' =>'active', 'url' =>'other/visa_information', 'title' =>'VISA Information', 'post_order' =>2, 'pages_id' =>16, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],

        ['id'=>3, 'name'=>'Housing Information','description'=>'Housing Information',
            'content' =>'<h3 style="text-align: justify; " open="" sans="" condensed",="" sans-serif;="" font-weight:="" 600;="" color:="" rgb(0,="" 0,="" 0);="" font-size:="" 14pt;"="">Housing and Travel</h3><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif;">Hotel Information<o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif;"><o:p>&nbsp;</o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif;">Reduced Rates at
Official Hotels<o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif;">Official hotels near
the show have been specially selected for your stay, provided at exclusive discounted
rates. <o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif;"><o:p>&nbsp;</o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif;">Click here to book in
the official hotel block<o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif;"><o:p>&nbsp;</o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family:" zawgyi-one","sans-serif""=""><a href="http://meetings.melia.com/en/IMSC2017.html">http://meetings.melia.com/en/IMSC2017.html</a></span><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:="" "times="" new="" roman""=""><o:p>&nbsp;</o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:="" "times="" new="" roman""=""><o:p>&nbsp;</o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:="" "times="" new="" roman""="">Nearby Hotels <o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:="" "times="" new="" roman""=""><o:p>&nbsp;</o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family:" zawgyi-one","sans-serif""=""><a href="http://www.sedonahotels.com.sg/yangon/"><span style="mso-fareast-font-family:
" times="" new="" roman";color:#1155cc"="">http://www.sedonahotels.com.sg/yangon/</span></a></span><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:="" "times="" new="" roman""=""><o:p>&nbsp;</o:p></span></p><p>































</p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family:" zawgyi-one","sans-serif""=""><a href="http://www.myanmar.micasahotel.com/default-en.html"><span style="mso-fareast-font-family:" times="" new="" roman";color:#1155cc"="">http://www.myanmar.micasahotel.com/default-en.html</span></a></span><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p>',
            'status' =>'active', 'url' =>'other/housing_information', 'title' =>'Housing Information', 'post_order' =>3, 'pages_id' =>16, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],

    );

    DB::table('posts')->insert($objs);
}
}