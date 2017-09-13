<?php
/**
 * Created by PhpStorm.
 * Author : Aung Ko Khant
 * Date: Feb/01/2017
 * Time: 11:32 AM
 */

use Illuminate\Database\Seeder;
class Default_PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    DB::table('pages')->delete();

    $objs = array(
        ['id'=>1, 'name'=>'Home','description'=>'Home description', 'content' =>'Home content', 'status' =>'active', 'url' =>'main_home', 'title' =>'Home title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'allow_edit' =>0, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>2, 'name'=>'Membership','description'=>'Membership description', 'content' =>'Membership content', 'status' =>'active', 'url' =>'main_membership', 'title' =>'Membership title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'allow_edit' =>0, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>3, 'name'=>'Publications','description'=>'Publications description', 'content' =>'Publications content', 'status' =>'active', 'url' =>'main_publications', 'title' =>'Publications title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'allow_edit' =>0, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>4, 'name'=>'Meetings','description'=>'Meetings description', 'content' =>'Meetings content', 'status' =>'active', 'url' =>'main_meetings', 'title' =>'Meetings title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'allow_edit' =>0, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>5, 'name'=>'Education','description'=>'Education description', 'content' =>'Education content', 'status' =>'active', 'url' =>'main_education', 'title' =>'Education title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'allow_edit' =>0, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>6, 'name'=>'Activities','description'=>'Activities description', 'content' =>'Activities content', 'status' =>'active', 'url' =>'main_activities', 'title' =>'Activities title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'allow_edit' =>0, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>7, 'name'=>'Advocacy','description'=>'Advocacy description', 'content' =>'Advocacy content', 'status' =>'active', 'url' =>'main_advocacy', 'title' =>'Advocacy title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'allow_edit' =>0, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>8, 'name'=>'Awards','description'=>'Awards description', 'content' =>'Awards content', 'status' =>'active', 'url' =>'main_awards', 'title' =>'Awards title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'allow_edit' =>0, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>9, 'name'=>'About Us','description'=>'About Us description', 'content' =>'About Us content', 'status' =>'active', 'url' =>'main_about_us', 'title' =>'About Us title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'allow_edit' =>0, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>10, 'name'=>'Partner Website','description'=>'Partner Website description', 'content' =>'Partner Website content', 'status' =>'active', 'url' =>'main_partner_website', 'title' =>'Partner Website title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'allow_edit' =>0, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>11, 'name'=>'Home','description'=>'Home description',
            'content' =>'<h4 style="line-height: 1.2;"><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-family:" zawgyi-one","sans-serif""=""><b>WELCOME
ADDRESS</b><o:p></o:p></span></h4>

<img src="/images/president_mi2.jpg" style="width: 219px;height:295px; float: right; padding-left:10px;"><p class="MsoNormal" style="line-height: 1.5;"></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><span style="font-family:" zawgyi-one","sans-serif""="">Dear
members of the AFIM and SEA Chapter of ACP<o:p></o:p></span></p>

<p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><span style="font-family:" zawgyi-one","sans-serif""="">It is my
pleasure to inform that the 18<sup>th</sup> Medical Specialty Conference of the
Internal Medicine Society of the Myanmar Medical Association will be held from
29<sup>th</sup> September 2017 to 1<sup>st</sup> October 2017in conjunction
with AFIM and ACP South East Chapter at Hotel Melia Yangon, Myanmar. <o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><span style="font-family:" zawgyi-one","sans-serif""="">It will
feature lectures, academic symposia on internal medicine and various medical
specialties by local and international speakers included those from AFIM
countries and ACP and presentation of scientific papers and posters of local
and regional researchers.<o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><span style="font-family:" zawgyi-one","sans-serif""="">Our
vision of the Conference is “Broaden the Horizons by Harmonization”.<o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><span style="font-family:" zawgyi-one","sans-serif""="">As
Myanmar is entering into a new chapter by actively involving in the
international activities we are pleased to invite all the participants to
experience the new development as well as already enriched Myanmar tradition
and culture.</span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><span style="background-color: rgb(252, 252, 252); font-family: Zawgyi-One, sans-serif;">Yours sincerely,</span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><span style="font-family: Zawgyi-One, sans-serif; background-color: rgb(252, 252, 252);">Prof Myo Lwin Nyein</span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><span style="font-family: Zawgyi-One, sans-serif; background-color: rgb(252, 252, 252);">Chairperson</span></p><span style="background: rgb(252, 252, 252);"><font face="Zawgyi-One, sans-serif"><div style="text-align: justify; line-height: 1.5;">Organizing Committee, MIMC 2017</div><div style="text-align: justify; line-height: 1.5;"><br></div></font></span><span style="font-family:" zawgyi-one","sans-serif";="" color:#2f3652;background:#fcfcfc"=""></span><p style="line-height: 1.5;"></p>

<p class="MsoNormal" style="line-height: 1.5;"><span style="font-size:14.0pt;line-height:107%;font-family:
" times="" new="" roman","serif";mso-bidi-font-family:"times="" roman";mso-bidi-theme-font:="" minor-bidi;mso-no-proof:yes"=""></span></p><h4 style="text-align: justify; line-height: 1.5;"><b><span style="font-family: Zawgyi-One, sans-serif;">MISSION
STATEMENT</span></b></h4>

<p class="MsoNormal" style="text-align: justify; line-height: 1.2;"><span style="font-family:" zawgyi-one","sans-serif""="">(The 18<sup>th</sup>
Myanmar Internal Medicine Conference(MIMC) in conjunction with 4<sup>th</sup>
AFIM Congress and ACP South East Asian Chapter meeting)</span></p><p class="MsoNormal" style="text-align: justify; line-height: 1;"><span style="font-family:" zawgyi-one","sans-serif""=""><br></span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><b style="color: rgb(36, 42, 48); font-family: inherit; font-size: 18px;">OUR
VISION</b></p>

<p class="MsoNormal" style="text-align: justify; line-height: 1;"><span style="font-family:" zawgyi-one","sans-serif""="">To
broaden the horizons by harmonization</span></p><p class="MsoNormal" style="text-align: justify; line-height: 1;"><span style="font-family:" zawgyi-one","sans-serif""=""><br></span></p><p class="MsoNormal" style="line-height: 1.5;"></p>

<h4 style="text-align: justify; line-height: 1;"><span style="font-family:" zawgyi-one","sans-serif""=""><b>OUR
MISSION</b></span></h4>

<p class="MsoNormal" style="text-align: justify; line-height: 1.2;"><span style="font-family:" zawgyi-one","sans-serif""="">To
maintain the professional and academic standard of the Myanmar Internal
Medicine Society (IMS)<o:p></o:p></span></p>

<p class="MsoNormal" style="text-align: justify; line-height: 1.2;"><span style="font-family:" zawgyi-one","sans-serif""="">To
extend the professional arena of the IMS to regional and international level.<o:p></o:p></span></p>

<p class="MsoNormal" style="text-align: justify; line-height: 1.2;"><span style="font-family:" zawgyi-one","sans-serif""="">To be an
active member of the AFIM and South East Asia Chapter of ACP.<o:p></o:p></span></p>

<p class="MsoNormal" style="text-align: justify; line-height: 1.2;"><span style="font-family:" zawgyi-one","sans-serif""="">To
promote the AFIM to a stronger professional organization by harmonization
between the member associations.</span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.2;"><br></p><table class="table table-bordered"><tbody><tr><td><b><span style="font-size: 14px;">Venue</span></b></td><td><span style="font-weight: 700; text-align: justify; font-size: 14px;">Melia Hotel, Yangon</span><br></td></tr><tr><td><b><span style="font-size: 14px;">Date</span></b></td><td><span style="font-weight: 700; font-family: Zawgyi-One; font-size: 14.6667px; text-align: justify;"><span style="font-size: 14px;">29</span><span style="position: relative; font-size: 14px; line-height: 0; vertical-align: baseline; top: -0.5em;">th</span><span style="font-size: 14px;">&nbsp;</span><span style="font-size: 14px;">September to 1</span><span style="position: relative; font-size: 14px; line-height: 0; vertical-align: baseline; top: -0.5em;">st</span><span style="font-size: 14px;">&nbsp;</span><span style="font-size: 14px;">October, 2017</span></span><br></td></tr><tr><td><span style="font-weight: 700; font-family: inherit; text-align: justify; color: rgb(36, 42, 48); font-size: 14px;">Early Registration Deadline</span><br></td><td><span style="font-weight: 700; color: rgb(255, 0, 0); font-family: Zawgyi-One; font-size: 14.6667px; text-align: justify;"><span style="font-size: 14px;">30<sup>th</sup> June 2017</span></span><br></td></tr><tr><td><span style="font-weight: 700; font-family: inherit; text-align: justify; color: rgb(36, 42, 48); font-size: 14px;">Abstract Submission Deadline</span><br></td><td><span style="font-weight: 700; color: rgb(255, 0, 0); font-family: Zawgyi-One; font-size: 14.6667px; text-align: justify;"><span style="font-size: 14px;">30<sup>th</sup></span><span style="font-size: 14px;">&nbsp;</span><span style="font-size: 14px;">June 2017</span></span><br></td></tr></tbody></table><p class="MsoNormal" style="text-align: justify; line-height: 1.2;"><br></p>',
            'status' =>'active', 'url' =>'home', 'title' =>'Home title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'allow_edit' =>1, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],

        ['id'=>12, 'name'=>'Register','description'=>'Register description',
            'content' =>'<h4 style="text-align: justify; "><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><b><span style="font-size: 11px;">﻿</span><span style="font-family: Zawgyi-One, sans-serif;">Registration
type</span></b></h4><table class="table table-bordered"><tbody><tr><td><span style="font-size: 14px;"><b>CATEGORIES</b></span></td><td><p><span style="font-size: 14px;"><b>EARLY BIRD</b></span></p><p><span style="font-size: 14px;"><b>30 JUNE 2017</b></span></p></td><td><span style="font-size: 14px;"><b>NORMAL RATE</b></span></td><td><span style="font-size: 14px;"><b>&nbsp;ONSITE REGISTRATION</b></span></td></tr><tr><td><span style="font-size: 14px;">International Delegate</span></td><td><span style="font-size: 14px;">$250</span></td><td><span style="font-size: 14px;">$300</span></td><td><span style="font-size: 14px;">$300</span></td></tr><tr><td><span style="font-size: 14px;">International Trainee</span></td><td><span style="font-size: 14px;">$200</span></td><td><span style="font-size: 14px;">$240</span></td><td><span style="font-size: 14px;">$240</span></td></tr><tr><td><span style="font-size: 14px;">Local Delegate (Member)</span></td><td><span style="font-size: 14px;">100000 MMK</span></td><td><span style="font-size: 14px;">150000 MMK</span></td><td><span style="font-size: 14px;">175000 MMK</span></td></tr><tr><td><span style="font-size: 14px;">Local Delegate (Non-member)</span></td><td><span style="font-size: 14px;">150000 MMK</span></td><td><span style="font-size: 14px;">200000 MMK</span></td><td><span style="font-size: 14px;">225000 MMK</span></td></tr><tr><td><span style="font-size: 14px;">Local Trainee</span></td><td><span style="font-size: 14px;">50000 MMK</span></td><td><span style="font-size: 14px;">50000 MMK</span></td><td><span style="font-size: 14px;">50000 MMK</span></td></tr></tbody></table><h4 style="text-align: justify; line-height: 1;"><p class="MsoListParagraphCxSpFirst" style="line-height: 1;"><span style="font-size:14.0pt;line-height:
107%;font-family:" zawgyi-one","sans-serif""=""><span style="font-size: 14px;">In terms of </span><b><span style="font-size: 14px;">international trainee</span></b><span style="font-size: 14px;">, you have to submit recommendation document (approve
by president of respective internal medicine society) which certifies that you
are entitled to resident training position or equivalents.</span><o:p></o:p></span></p><span style="font-size: 14px;">

</span><p class="MsoListParagraphCxSpMiddle" style="line-height: 1;"><span style="font-size:14.0pt;line-height:
107%;font-family:" zawgyi-one","sans-serif""=""><span style="font-size: 14px;">In terms of </span><b><span style="font-size: 14px;">local delegates</span></b><span style="font-size: 14px;">, the following delegates are regarded as members</span></span></p><span style="font-size: 14px;">

</span><p class="MsoListParagraphCxSpMiddle" style="margin-left: 0.75in; text-indent: -0.25in; line-height: 1;"><!--[if !supportLists]--><span style="font-size:14.0pt;line-height:107%;font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:zawgyi-one"=""><span style="font-size: 14px;">1)</span><span style="font-variant-numeric: normal; font-stretch: normal; font-size: 14px; line-height: normal;" times="" new="" roman";"="">&nbsp;&nbsp; </span></span><!--[endif]--><span style="font-size:14.0pt;line-height:107%;font-family:" zawgyi-one","sans-serif""=""><span style="font-size: 14px;">Members
of Internal Medicine Society</span><o:p></o:p></span></p><span style="font-size: 14px;">

</span><p class="MsoListParagraphCxSpLast" style="margin-left: 0.75in; text-indent: -0.25in; line-height: 1;"><!--[if !supportLists]--><span style="font-size:14.0pt;line-height:107%;font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:zawgyi-one"=""><span style="font-size: 14px;">2)</span><span style="font-variant-numeric: normal; font-stretch: normal; font-size: 14px; line-height: normal;" times="" new="" roman";"="">&nbsp;&nbsp; </span></span><!--[endif]--><span style="font-size: 14px; line-height: 107%; font-family: Zawgyi-One, sans-serif;">Members
of partner Specialty Societies</span></p><p class="MsoListParagraphCxSpLast" style="margin-left: 0.75in; text-indent: -0.25in; line-height: 1;"><br></p></h4><h4 style="text-align: justify; "><span style="font-size: 14px;"><b>Partner Specialty Societies of Internal Medicine Society</b></span></h4><h4 style="text-align: justify; "><span style="font-size: 12px;">﻿1.</span>&nbsp; &nbsp; <span style="font-size: 12px;">CARDIOLOGY</span></h4><h4 style="text-align: justify; "><span style="font-size: 12px;">2.</span>&nbsp; &nbsp;&nbsp;<span style="font-size: 12px;">﻿NEUROLOGY</span></h4><h4 style="text-align: justify; "><span style="font-size: 12px;">3.</span>&nbsp; &nbsp;&nbsp;<span style="font-size: 12px;">﻿RESPIRATORY MEDICINE</span></h4><h4 style="text-align: justify; "><span style="font-size: 12px;">4.</span>&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 11px;">﻿</span><span style="font-size: 12px;">﻿</span><span style="font-size: 12px;">﻿ENDOCRINE &amp; METABOLISM</span></h4><h4 style="text-align: justify; "><span style="font-size: 12px;">5.</span>&nbsp; &nbsp;&nbsp;<span style="font-size: 12px;">﻿GASTROENTEROLOGY &amp; HEPATOLOGY</span></h4><h4 style="text-align: justify; "><span style="font-size: 12px;">6.</span>&nbsp; &nbsp;&nbsp;<span style="font-size: 12px;">﻿HEMATOLOGY</span></h4><h4 style="text-align: justify; "><span style="font-size: 12px;">7.</span>&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 12px;">﻿URO-NEPHROLOGY</span></h4><h4 style="text-align: justify; "><span style="font-size: 12px;">8.</span>&nbsp; &nbsp;&nbsp;<span style="font-size: 12px;">﻿RHEUMATOLOGY</span></h4><h4 style="text-align: justify; "><span style="font-size: 12px;">9.</span>&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 12px;">﻿DERMATOLOGY</span></h4><h4 style="text-align: justify; "><span style="font-size: 12px;">10.</span>&nbsp; &nbsp;<span style="font-size: 12px;">﻿REHABILITATION MEDICINE</span></h4><h4 style="text-align: justify; "><span style="font-size: 12px;">11.</span>&nbsp; &nbsp;<span style="font-size: 12px;">﻿ONCOLOGY</span></h4><h4 style="text-align: justify; "><span style="font-size: 12px;">12.</span>&nbsp; &nbsp;<span style="font-size: 12px;">﻿RADIOLOGY</span></h4><h4 style="text-align: justify; "><span style="font-size: 12px;">13.</span>&nbsp; &nbsp;<span style="font-size: 12px;">﻿NUCLEAR MEDICINE</span></h4><h4 style="text-align: justify; "><span style="font-size: 12px;">14.</span>&nbsp; &nbsp;<span style="font-size: 12px;">﻿CLINICAL PATHOLOGY</span></h4><h4 style="text-align: justify; "><span style="font-size: 12px;">15.</span>&nbsp; &nbsp;<span style="font-size: 12px;">﻿PREVENTIVE &amp; SOCIAL MEDICINE</span></h4><h4 style="text-align: justify; "><span style="font-size: 12px;">16.</span>&nbsp; &nbsp;<span style="font-size: 12px;">﻿MICROBIOLOGY</span></h4><h4 style="text-align: justify; "><span style="font-size: 12px;">17.</span>&nbsp; &nbsp;<span style="font-size: 12px;">﻿PHARMACOLOGY</span></h4><h4 style="text-align: justify; "><span style="font-size: 12px;">18.</span>&nbsp; &nbsp;<span style="font-size: 12px;">﻿PHYSIOLOGY &amp; BIOCHEMISTRY</span><span style="font-size: 12px;"><br></span><br></h4><h4 style="text-align: justify; "><b style="font-family: inherit; font-size: 14px;">Registration Fee Inclusions for&nbsp;Conference</b><br></h4><span style="font-family:" zawgyi-one","sans-serif";="" mso-bidi-font-weight:bold"=""><div style="text-align: justify;">. &nbsp; &nbsp; &nbsp; Admission to
scientific&nbsp;sessions</div><div style="text-align: justify;">.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Admission to industry satellite
sessions</div><div style="text-align: justify;">.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Admission to trade exhibition</div><div style="text-align: justify;">.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name badge</div>
<div style="text-align: justify;"><br></div>
</span><p></p><h5 style="text-align: justify;"><span style="font-family:" zawgyi-one","sans-serif";="" mso-bidi-font-weight:bold"=""><b><u>Terms and Conditions</u></b></span></h5><span style="font-family:" zawgyi-one","sans-serif";="" mso-bidi-font-weight:bold"=""><div style="text-align: justify;">.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Workshop registrants must register
and pay for Main Congress.</div><div style="text-align: justify;">.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Registrations are confirmed only upon
receipt of payment.</div><div style="text-align: justify;">.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Registration fee applied will be
based on date of payment received.</div><div style="text-align: justify;">.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If you cannot attend the event we
are happy to accept a substitute delegate until&nbsp;31 April 2017.</div></span><p></p><p class="MsoNormal" style="text-align: justify; margin-left: 0.25in;"><span style="font-family:" zawgyi-one","sans-serif";="" mso-bidi-font-weight:bold"=""><o:p><br></o:p></span></p><h5 style="text-align: justify; line-height: 1;"><b><u><span style="font-family:
" zawgyi-one","sans-serif""="">Registration Cancellation/Refund Process</span></u></b></h5><p class="MsoNormal" style="text-align: justify; line-height: 1;">All
cancellations must be received in writing/email.</p><p class="MsoNormal" style="text-align: justify; line-height: 1.2;"><b><span style="font-family:" zawgyi-one","sans-serif""="">Until
June 15, 2017</span></b></p><p class="MsoNormal" style="text-align: justify; line-height: 1.2;">Cancellations
made by this date will receive a full refund, minus a $50 processing fee.</p><p class="MsoNormal" style="text-align: justify; line-height: 1.2;"><b><span style="font-family:" zawgyi-one","sans-serif""="">June 16 – July 31, 2017<o:p></o:p></span></b></p><p class="MsoNormal" style="text-align: justify; line-height: 1.2;"><span style="font-family:" zawgyi-one","sans-serif""="">Cancellations
received by June 16 – July 31, 2017 will
receive a 50% refund.<o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.2;"><b><span style="font-family:" zawgyi-one","sans-serif""="">After
July 31, 2017<o:p></o:p></span></b></p><p class="MsoNormal" style="text-align: justify; line-height: 1.2;"><span style="font-family:" zawgyi-one","sans-serif""="">No
refunds will be issued for cancellations or for no-shows after July 31.</span></p><p class="MsoNormal" style="text-align: justify; line-height: 1;"><span style="font-family:" zawgyi-one","sans-serif""=""><br></span></p><p class="MsoNormal" style="text-align: justify; line-height: 1;"><span style="font-family:" zawgyi-one","sans-serif""="">Registrants
who provide a written notification to the official Registration Committee for
the following circumstances,&nbsp;</span>can
receive a partial refund:</p><p style="text-align: justify; line-height: 1;"><span style="font-family:" zawgyi-one","sans-serif""="">.</span>&nbsp; &nbsp; &nbsp; &nbsp;A
death in the family.</p><p style="text-align: justify; line-height: 1;"><span style="font-family:" zawgyi-one","sans-serif""=""><span zawgyi-one","sans-serif""="">.</span>&nbsp; &nbsp; &nbsp; &nbsp;Personal
injury or personal sudden illness.<o:p></o:p></span></p><p style="text-align: justify; line-height: 1;"><span style="font-family:" zawgyi-one","sans-serif""=""><span zawgyi-one","sans-serif""="">.</span>&nbsp; &nbsp; &nbsp; &nbsp;Cancelled
flights.<o:p></o:p></span></p><p class="MsoNormal">

























</p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><span style="font-family:" zawgyi-one","sans-serif""="">Refund
requested for other reasons, must be approved by Myanmar Internal Medicine Society.
Refunds requested after May 30 will be processed one month after conference.<o:p></o:p></span></p><p class="MsoNormal"><span style="font-family:" zawgyi-one","sans-serif""=""><o:p></o:p></span></p>
<div style="text-align: justify;"><a href="/register/create"><button type="button" class="btn btn-primary down">Register Now</button></a><a href="/register/create"><br></a></div><p></p><p style="text-align: justify; line-height: 1;">Our system will send email automatically after you register. You may need to send your bank statement by mail to us.</p>',
            'status' =>'active', 'url' =>'home/register', 'title' =>'Register title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'allow_edit' =>1, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],

        ['id'=>13, 'name'=>'Abstract','description'=>'Abstract description',
            'content' =>'<h5 style="text-align: justify; "><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><b style="mso-bidi-font-weight:normal"><u><span style="font-family:" zawgyi-one","sans-serif""="">Now Accepting Abstracts</span></u></b></h5>

<p class="MsoNormal" style="text-align: justify; line-height: 1.4;"><span style="font-family:" zawgyi-one","sans-serif""="">It’s
time to summit abstracts of your research papers at the great gathering of
physicians and specialists from AFIM and ACP.&nbsp;</span>Authors
may summit their abstracts online.</p><p class="MsoNormal" style="text-align: justify; line-height: 1;"><br></p>

<h5 style="text-align: justify; line-height: 1.4;"><b style="mso-bidi-font-weight:normal"><u><span style="font-family:" zawgyi-one","sans-serif""="">Process of selection</span></u></b></h5>

<p class="MsoNormal" style="text-align: justify; line-height: 1.4;"><span style="font-family:" zawgyi-one","sans-serif""="">Each
abstract is reviewed by the abstract selection committee. The modes of presentation
are oral and poster presentation. The accepted abstracts are scheduled for oral
or poster presentation by the committee. The best paper awards will be given
for both oral and poster presentations.</span>&nbsp;</p><p class="MsoNormal" style="text-align: justify; line-height: 1;"><br></p>

<h5 style="text-align: justify;"><b style="mso-bidi-font-weight:normal"><u><span style="font-family:" zawgyi-one","sans-serif""="">Deadline for abstract submission</span></u></b><span style="font-family:" zawgyi-one","sans-serif""=""> – <font color="#ff0000"><b>30<sup>th&nbsp;</sup></b></font></span><b><font color="#ff0000">June</font></b><b style="font-family: inherit; color: rgb(255, 0, 0);">, 2017</b></h5><h5 style="text-align: justify; line-height: 1;"><span style="font-family:" zawgyi-one","sans-serif""=""><font color="#ff0000"><b><br></b></font></span></h5>

<div style="text-align: justify;"><a href="/download/Abstract_Submission_Form.docx"><button type="button" class="btn btn-primary down">Download Abstract Form</button></a>
    <a href="/abstractform/create"><button type="button" class="btn btn-primary up">Upload Abstract</button></a><a href="#"><br></a></div><p class="MsoNormal" style="text-align: justify; line-height: 1;"><span style="font-family:" zawgyi-one","sans-serif""="">We will confirm you by email if we accept the abstract. Once you get confirmation, you will need to register event from the web again.</span></p>',
            'status' =>'active', 'url' =>'home/abstract', 'title' =>'Abstract title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'allow_edit' =>1, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],

        ['id'=>14, 'name'=>'Exhibitor','description'=>'Exhibitor description',
            'content' =>'<h4 style="text-align: left;"><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><b><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span>Exhibitor Information</b></h4>
        <p><!--[if gte mso 9]><xml>
 <o:OfficeDocumentSettings>
  <o:AllowPNG></o:AllowPNG>
 </o:OfficeDocumentSettings>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <w:WordDocument>
  <w:View>Normal</w:View>
  <w:Zoom>0</w:Zoom>
  <w:TrackMoves></w:TrackMoves>
  <w:TrackFormatting></w:TrackFormatting>
  <w:PunctuationKerning></w:PunctuationKerning>
  <w:ValidateAgainstSchemas></w:ValidateAgainstSchemas>
  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>
  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>
  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>
  <w:DoNotPromoteQF></w:DoNotPromoteQF>
  <w:LidThemeOther>EN-US</w:LidThemeOther>
  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>
  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>
  <w:Compatibility>
   <w:BreakWrappedTables></w:BreakWrappedTables>
   <w:SnapToGridInCell></w:SnapToGridInCell>
   <w:WrapTextWithPunct></w:WrapTextWithPunct>
   <w:UseAsianBreakRules></w:UseAsianBreakRules>
   <w:DontGrowAutofit></w:DontGrowAutofit>
   <w:SplitPgBreakAndParaMark></w:SplitPgBreakAndParaMark>
   <w:EnableOpenTypeKerning></w:EnableOpenTypeKerning>
   <w:DontFlipMirrorIndents></w:DontFlipMirrorIndents>
   <w:OverrideTableStyleHps></w:OverrideTableStyleHps>
  </w:Compatibility>
  <m:mathPr>
   <m:mathFont m:val="Cambria Math"></m:mathFont>
   <m:brkBin m:val="before"></m:brkBin>
   <m:brkBinSub m:val="--"></m:brkBinSub>
   <m:smallFrac m:val="off"></m:smallFrac>
   <m:dispDef></m:dispDef>
   <m:lMargin m:val="0"></m:lMargin>
   <m:rMargin m:val="0"></m:rMargin>
   <m:defJc m:val="centerGroup"></m:defJc>
   <m:wrapIndent m:val="1440"></m:wrapIndent>
   <m:intLim m:val="subSup"></m:intLim>
   <m:naryLim m:val="undOvr"></m:naryLim>
  </m:mathPr></w:WordDocument>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"
  DefSemiHidden="true" DefQFormat="false" DefPriority="99"
  LatentStyleCount="267">
  <w:LsdException Locked="false" Priority="0" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Normal"></w:LsdException>
  <w:LsdException Locked="false" Priority="9" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="heading 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 7"></w:LsdException>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 8"></w:LsdException>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 9"></w:LsdException>
  <w:LsdException Locked="false" Priority="39" Name="toc 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="39" Name="toc 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="39" Name="toc 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="39" Name="toc 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="39" Name="toc 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="39" Name="toc 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="39" Name="toc 7"></w:LsdException>
  <w:LsdException Locked="false" Priority="39" Name="toc 8"></w:LsdException>
  <w:LsdException Locked="false" Priority="39" Name="toc 9"></w:LsdException>
  <w:LsdException Locked="false" Priority="35" QFormat="true" Name="caption"></w:LsdException>
  <w:LsdException Locked="false" Priority="10" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Title"></w:LsdException>
  <w:LsdException Locked="false" Priority="1" Name="Default Paragraph Font"></w:LsdException>
  <w:LsdException Locked="false" Priority="11" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Subtitle"></w:LsdException>
  <w:LsdException Locked="false" Priority="22" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Strong"></w:LsdException>
  <w:LsdException Locked="false" Priority="20" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Emphasis"></w:LsdException>
  <w:LsdException Locked="false" Priority="59" SemiHidden="false"
   UnhideWhenUsed="false" Name="Table Grid"></w:LsdException>
  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Placeholder Text"></w:LsdException>
  <w:LsdException Locked="false" Priority="1" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="No Spacing"></w:LsdException>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading"></w:LsdException>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List"></w:LsdException>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid"></w:LsdException>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List"></w:LsdException>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading"></w:LsdException>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List"></w:LsdException>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid"></w:LsdException>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 1"></w:LsdException>
  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Revision"></w:LsdException>
  <w:LsdException Locked="false" Priority="34" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="List Paragraph"></w:LsdException>
  <w:LsdException Locked="false" Priority="29" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Quote"></w:LsdException>
  <w:LsdException Locked="false" Priority="30" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Intense Quote"></w:LsdException>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="19" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Subtle Emphasis"></w:LsdException>
  <w:LsdException Locked="false" Priority="21" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Intense Emphasis"></w:LsdException>
  <w:LsdException Locked="false" Priority="31" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Subtle Reference"></w:LsdException>
  <w:LsdException Locked="false" Priority="32" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Intense Reference"></w:LsdException>
  <w:LsdException Locked="false" Priority="33" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Book Title"></w:LsdException>
  <w:LsdException Locked="false" Priority="37" Name="Bibliography"></w:LsdException>
  <w:LsdException Locked="false" Priority="39" QFormat="true" Name="TOC Heading"></w:LsdException>
 </w:LatentStyles>
</xml><![endif]--><!--[if gte mso 10]>
<style>
 /* Style Definitions */
 table.MsoNormalTable
	{mso-style-name:"Table Normal";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-parent:"";
	mso-padding-alt:0in 5.4pt 0in 5.4pt;
	mso-para-margin-top:0in;
	mso-para-margin-right:0in;
	mso-para-margin-bottom:8.0pt;
	mso-para-margin-left:0in;
	line-height:107%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;}
</style>
<![endif]-->

</p><p class="MsoNormal" style="text-align: left;"><span style="font-size: 14px;" zawgyi-one","sans-serif""="">Please
contact the MIMC 2017 Secretariat at&nbsp;</span><span style="font-family: Zawgyi-One, sans-serif; font-size: 14px;">Professor Daw Mar Mar Kyi (treasurer@internalmedicinesocietymyanmar.com) for more details on sponsorship items and premier sponsorship packages.</span></p><p class="MsoNormal"><span style="font-size:12.0pt;line-height:107%;font-family:
" zawgyi-one","sans-serif""=""><o:p></o:p></span></p>

<p class="MsoNormal" style="text-align: left; margin-left: 0.5in; text-indent: -0.25in;"><span style="font-family:Wingdings;
mso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings"><span style="mso-list:Ignore">¢<span style="font:7.0pt " times="" new="" roman""="">&nbsp; </span></span></span><b><span style="font-family:" zawgyi-one","sans-serif""="">Deadline: </span></b><span zawgyi-one","sans-serif""=""><font color="#ff0000"><b>30<sup>th&nbsp;</sup>June, 2017</b></font></span><span style="font-family:" zawgyi-one","sans-serif""=""></span></p>





',
            'status' =>'active', 'url' =>'home/exhibitor', 'title' =>'Exhibitor title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'allow_edit' =>1, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],

        ['id'=>15, 'name'=>'Conference','description'=>'Conference description',
            'content' =>'<h3>Conference Information</h3><p><!--[if gte mso 9]><xml>
 <o:OfficeDocumentSettings>
  <o:AllowPNG></o:AllowPNG>
 </o:OfficeDocumentSettings>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <w:WordDocument>
  <w:View>Normal</w:View>
  <w:Zoom>0</w:Zoom>
  <w:TrackMoves></w:TrackMoves>
  <w:TrackFormatting></w:TrackFormatting>
  <w:PunctuationKerning></w:PunctuationKerning>
  <w:ValidateAgainstSchemas></w:ValidateAgainstSchemas>
  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>
  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>
  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>
  <w:DoNotPromoteQF></w:DoNotPromoteQF>
  <w:LidThemeOther>EN-US</w:LidThemeOther>
  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>
  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>
  <w:Compatibility>
   <w:BreakWrappedTables></w:BreakWrappedTables>
   <w:SnapToGridInCell></w:SnapToGridInCell>
   <w:WrapTextWithPunct></w:WrapTextWithPunct>
   <w:UseAsianBreakRules></w:UseAsianBreakRules>
   <w:DontGrowAutofit></w:DontGrowAutofit>
   <w:SplitPgBreakAndParaMark></w:SplitPgBreakAndParaMark>
   <w:EnableOpenTypeKerning></w:EnableOpenTypeKerning>
   <w:DontFlipMirrorIndents></w:DontFlipMirrorIndents>
   <w:OverrideTableStyleHps></w:OverrideTableStyleHps>
  </w:Compatibility>
  <m:mathPr>
   <m:mathFont m:val="Cambria Math"></m:mathFont>
   <m:brkBin m:val="before"></m:brkBin>
   <m:brkBinSub m:val="--"></m:brkBinSub>
   <m:smallFrac m:val="off"></m:smallFrac>
   <m:dispDef></m:dispDef>
   <m:lMargin m:val="0"></m:lMargin>
   <m:rMargin m:val="0"></m:rMargin>
   <m:defJc m:val="centerGroup"></m:defJc>
   <m:wrapIndent m:val="1440"></m:wrapIndent>
   <m:intLim m:val="subSup"></m:intLim>
   <m:naryLim m:val="undOvr"></m:naryLim>
  </m:mathPr></w:WordDocument>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"
  DefSemiHidden="true" DefQFormat="false" DefPriority="99"
  LatentStyleCount="267">
  <w:LsdException Locked="false" Priority="0" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Normal"></w:LsdException>
  <w:LsdException Locked="false" Priority="9" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="heading 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 7"></w:LsdException>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 8"></w:LsdException>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 9"></w:LsdException>
  <w:LsdException Locked="false" Priority="39" Name="toc 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="39" Name="toc 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="39" Name="toc 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="39" Name="toc 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="39" Name="toc 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="39" Name="toc 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="39" Name="toc 7"></w:LsdException>
  <w:LsdException Locked="false" Priority="39" Name="toc 8"></w:LsdException>
  <w:LsdException Locked="false" Priority="39" Name="toc 9"></w:LsdException>
  <w:LsdException Locked="false" Priority="35" QFormat="true" Name="caption"></w:LsdException>
  <w:LsdException Locked="false" Priority="10" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Title"></w:LsdException>
  <w:LsdException Locked="false" Priority="1" Name="Default Paragraph Font"></w:LsdException>
  <w:LsdException Locked="false" Priority="11" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Subtitle"></w:LsdException>
  <w:LsdException Locked="false" Priority="22" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Strong"></w:LsdException>
  <w:LsdException Locked="false" Priority="20" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Emphasis"></w:LsdException>
  <w:LsdException Locked="false" Priority="59" SemiHidden="false"
   UnhideWhenUsed="false" Name="Table Grid"></w:LsdException>
  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Placeholder Text"></w:LsdException>
  <w:LsdException Locked="false" Priority="1" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="No Spacing"></w:LsdException>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading"></w:LsdException>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List"></w:LsdException>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid"></w:LsdException>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List"></w:LsdException>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading"></w:LsdException>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List"></w:LsdException>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid"></w:LsdException>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 1"></w:LsdException>
  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Revision"></w:LsdException>
  <w:LsdException Locked="false" Priority="34" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="List Paragraph"></w:LsdException>
  <w:LsdException Locked="false" Priority="29" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Quote"></w:LsdException>
  <w:LsdException Locked="false" Priority="30" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Intense Quote"></w:LsdException>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 1"></w:LsdException>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 2"></w:LsdException>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 3"></w:LsdException>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 4"></w:LsdException>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 5"></w:LsdException>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 6"></w:LsdException>
  <w:LsdException Locked="false" Priority="19" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Subtle Emphasis"></w:LsdException>
  <w:LsdException Locked="false" Priority="21" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Intense Emphasis"></w:LsdException>
  <w:LsdException Locked="false" Priority="31" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Subtle Reference"></w:LsdException>
  <w:LsdException Locked="false" Priority="32" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Intense Reference"></w:LsdException>
  <w:LsdException Locked="false" Priority="33" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Book Title"></w:LsdException>
  <w:LsdException Locked="false" Priority="37" Name="Bibliography"></w:LsdException>
  <w:LsdException Locked="false" Priority="39" QFormat="true" Name="TOC Heading"></w:LsdException>
 </w:LatentStyles>
</xml><![endif]--><!--[if gte mso 10]>
<style>
 /* Style Definitions */
 table.MsoNormalTable
	{mso-style-name:"Table Normal";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-parent:"";
	mso-padding-alt:0in 5.4pt 0in 5.4pt;
	mso-para-margin-top:0in;
	mso-para-margin-right:0in;
	mso-para-margin-bottom:8.0pt;
	mso-para-margin-left:0in;
	line-height:107%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;}
</style>
<![endif]-->

</p><p class="MsoNormal"><span style="font-family:" zawgyi-one","sans-serif""="">Agenda</span></p>

<p class="MsoNormal"><span style="font-family:" zawgyi-one","sans-serif""="">To be
confirmed.</span></p>

<p class="MsoNormal"><span style="font-family:" zawgyi-one","sans-serif""="">Scientific
Sessions will be included.</span></p>

<p class="MsoListParagraphCxSpFirst" style="text-indent:-.25in;mso-list:l0 level1 lfo1"><span style="font-family:" times="" new="" roman","serif";mso-fareast-font-family:"times="" roman""=""><span style="mso-list:Ignore">-<span style="font:7.0pt " times="" new="" roman""="">         
</span></span></span><span style="font-family:" zawgyi-one","sans-serif""="">Symposium</span></p>

<p class="MsoListParagraphCxSpMiddle" style="text-indent:-.25in;mso-list:l0 level1 lfo1"><span style="font-family:" times="" new="" roman","serif";mso-fareast-font-family:"times="" roman""=""><span style="mso-list:Ignore">-<span style="font:7.0pt " times="" new="" roman""="">         
</span></span></span><span style="font-family:" zawgyi-one","sans-serif""="">Meet
the expert </span></p>

<p class="MsoListParagraphCxSpMiddle" style="text-indent:-.25in;mso-list:l0 level1 lfo1"><span style="font-family:" times="" new="" roman","serif";mso-fareast-font-family:"times="" roman""=""><span style="mso-list:Ignore">-<span style="font:7.0pt " times="" new="" roman""="">         
</span></span></span><span style="font-family:" zawgyi-one","sans-serif""="">Paper
presentation</span></p>

<p class="MsoListParagraphCxSpLast" style="text-indent:-.25in;mso-list:l0 level1 lfo1"><span style="font-family:" times="" new="" roman","serif";mso-fareast-font-family:"times="" roman""=""><span style="mso-list:Ignore">-<span style="font:7.0pt " times="" new="" roman""="">         
</span></span></span><span style="font-family:" zawgyi-one","sans-serif""="">Plenary
lecturer</span></p>

<p class="MsoNormal"><span style="font-family:" zawgyi-one","sans-serif""="">Speakers</span></p>

<p class="MsoNormal"><span style="font-family:" zawgyi-one","sans-serif""="">To be confirmed.</span></p>

<p class="MsoNormal"><span style="font-family:" zawgyi-one","sans-serif""=""> </span></p>

<p class="MsoNormal"><span style="font-family:" zawgyi-one","sans-serif""="">Committees</span></p>

<p class="MsoNormal"><span style="font-family:" zawgyi-one","sans-serif""=""> </span></p>

<p class="MsoNormal"><span style="font-family:" zawgyi-one","sans-serif""="">Contact
us</span></p>

<p class="MsoNormal"><span style="font-family:" zawgyi-one","sans-serif""="">For
sponsorship information: Prof Mar Mar Kyi <drmmkyi@gmail.com></drmmkyi@gmail.com></span></p>

<span style="font-size:11.0pt;line-height:107%;font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:calibri;mso-fareast-theme-font:minor-latin;mso-ansi-language:="" en-us;mso-fareast-language:en-us;mso-bidi-language:ar-sa"="">For Conference
information: AP Thein Myint <a href="mailto:drthanemyint@gmail.com">drthanemyint@gmail.com</a> </span></p><p><span style="font-size:11.0pt;line-height:107%;font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:calibri;mso-fareast-theme-font:minor-latin;mso-ansi-language:="" en-us;mso-fareast-language:en-us;mso-bidi-language:ar-sa"=""><br></span></p>',
            'status' =>'active', 'url' =>'home/conference', 'title' =>'Other title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'allow_edit' =>1, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],

        ['id'=>16, 'name'=>'Other','description'=>'Other description', 'content' =>'',
            'status' =>'active', 'url' =>'home/other', 'title' =>'Other title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'allow_edit' =>1, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],

        ['id'=>17, 'name'=>'Local Information','description'=>'Local Information', 'content' =>'<h3 style="text-align: justify; line-height: 1.5;" open="" sans="" condensed",="" sans-serif;="" font-weight:="" 600;="" color:="" rgb(0,="" 0,="" 0);="" font-size:="" 14pt;"=""><span style="font-size: 11px;">﻿</span>Local Information</h3><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: 1.5;"><span style="font-weight: 700;"><span style="font-family: Zawgyi-One, sans-serif;">Myanmar</span></span><b><span style="font-family: Zawgyi-One, sans-serif;"><br></span></b><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="margin-bottom: 0.0001pt; line-height: 1.5;"></p><div style="text-align: justify; line-height: 1;"><font face="Zawgyi-One, sans-serif"><br></font></div><span style="font-family: Zawgyi-One, sans-serif;"><div style="text-align: justify; line-height: 1.5;">Myanmar (formerly Burma) is a Southeast Asian nation of more than 100 ethnic
groups, bordering India, Bangladesh, China, Laos and Thailand. Myanmar is the
second largest country (about the size of France) in Southeast Asian and has a
population of 52 millions. Yangon (formerly Rangoon), the country\'s largest
city, is home to bustling markets, numerous parks and lakes, and the towering,
gilded Shwedagon Pagoda, which contains Buddhist relics and dates to the 6th
century.</div><div style="text-align: justify; line-height: 1.5;">Other important Buddhist sites include the ancient city of Bagan, studded with
more than 2,000 temples and pagodas, and Kyaiktiyo Pagoda, perched atop a rock
at the edge of a steep hillside. Cruises along Burma’s Irrawaddy River take in
historic landmarks, such as the 19th-century Mandalay Palace, and rural
scenery. Visitors in motorboats and fishermen propelling skiffs cross Inle
Lake, which is lined with villages on stilts and colorful markets. Along
Burma\'s Bay of Bengal coast, Ngapali is a palm-lined, upscale beach resort
area.</div></span><p style="line-height: 1.5;"></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: 1;"><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:="" "times="" new="" roman""=""><o:p>&nbsp;</o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><b><span style="font-family: Zawgyi-One, sans-serif; color: rgb(1, 1, 1); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">Currency :&nbsp;</span></b><span style="font-family: Zawgyi-One, sans-serif; color: rgb(1, 1, 1); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">The Myanmar Kyat, indicated
as MMK is the currency of Myanmar. Notes are in denominations of Kyats 10000,
5000, 1000, 500, 200, 100 and 50. Upon arrival at the airport, you will be able
to find money changers.</span><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><b><span style="font-family: Zawgyi-One, sans-serif; color: rgb(1, 1, 1); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">Credit
Card :&nbsp;</span></b><span style="font-family: Zawgyi-One, sans-serif; color: rgb(1, 1, 1); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">Credit Cards are only
accepted at major hotels, airlines and some international shops and
restaurants. Usually a fee is charged for credit card transactions. You are
recommended to bring adequate cash.</span></p><p class="MsoNormal" style="text-align: justify; line-height: 1;"><span style="font-family: Zawgyi-One, sans-serif; color: rgb(1, 1, 1); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><br></span><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><b><span style="font-family: Zawgyi-One, sans-serif; color: rgb(1, 1, 1); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">About
Yangon</span></b><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:="" "times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><b><span style="font-family: Zawgyi-One, sans-serif; color: rgb(1, 1, 1); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">History</span></b><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">King
Alaungpaya founded Yangon in AD 1755 from Mon. He renamed Yangon from Dagon (it
means ends of Strife). Dagon was a small fishing village centered about
Shwedagon Pagoda and was built by King Okkalapa. King Alaungpaya extended his
empire like Thanlyin to Yangon to prevent from Filipe de Brito e Nicote (a) Nga
Zinga, Portuguese adventurer and mercenary. </span><span style="font-family:
" zawgyi-one","sans-serif";mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">In
colonies period, Yangon had transformed into the commercial and political hub
of British Burma. Yangon was chosen as capital of Myanmar (Burma). The British
renamed Rangoon from Yangon. Yangon has the largest number of colonial
buildings, architecture, offices, churches, mosques, and temples.</span><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">At the
time of colonies period, there is less people of Myanmar (Burma). There are a
lot of Indian, Chinese, and some are the British people in Yangon. After
independence in 1948, although the British brought back Indian, there are still
left Indian in Yangon. After 1966, Myanmar government holds closed policy and
many Indian and Chinese went back their origin countries. Nowadays, Yangon has
lots of Myanmar (Burma) in Yangon.</span></p><p class="MsoNormal" style="text-align: justify; line-height: 1;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><br></span><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><b><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">Sightseeing
in Yangon</span></b><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">The
central of the town is Sule Pagoda; the roads are face to pagoda. Myanmar is
independent religious country, Immanuel Baptist Church and Jama Aasjid Mosque
are allowed to construct near around Sule Pagoda. Among those, there are city
hall, Mahabandola Garden, the Supreme Court and other colonial buildings. </span><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">Along
the Strand Road, the visitors can start from Botahtaung Pagoda. The Strand
Hotel (five star hotels) was built by the British and it is over 100 years
long. The visitors can feel the taste of colonial by drinking coffee or tea.
The other side of the Strand Hotel is Nan Thi Tar port. The view from the
Strand Hotel is very attractive. The other side of Yangon River is Dala and the
visitors can take ferry and the view from Dala is the whole panoramic of
Yangon. It is the amazing view. Kheng Hock Chinese Temple is also on Strand
Road.</span><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:="" "times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">Along
the Merchant Road, Anawrahta Road, Mahabandola Road, the visitors can see the
colonial buildings and architecture, many crowded food shops, clinics, medical
stores, electronic shops camera shops, glass shops, china town and other
religious buildings </span><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">Along
the Bogyoke Road, can view St.Mary’s Catholic, was built in 1899, Yangon Train
Station, the cinemas, Bogyoke Market, Yangon General Hospital built by the
British.</span><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:="" "times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">There
are a lot of golden pagodas like Shwe Dagon Pagoda, Sule Pagoda, Chauk Htatgyi
Pagoda and other attractions like museum, parks, lake, Yangon Zoological
Garden, Golf Clubs and many other interesting places.</span></p><p class="MsoNormal" style="text-align: justify; line-height: 1;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><br></span><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><b><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">Main
Attractions in Yangon</span></b><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">1)
Shwedagon Pagoda</span><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">2) Sule
Pagoda &amp; Downtown Yangon</span><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">3)
Chauk Htatgyi Pagoda</span><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">4)
Thirimingalar Kaba Aye Pagoda</span><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">5) Maha
Pasana Gula</span><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">6)
National Museum</span><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">7)
Souvenir and Gift Shops &amp; Painting Glory</span><span style="font-family:
" zawgyi-one","sans-serif";mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">8)
Jewelry Shops </span><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">9)
Bogyoke Market</span><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p style="line-height: 1.5;">



















































</p><p class="MsoNormal" style="text-align: justify; line-height: 1.5;"><span style="font-family: Zawgyi-One, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">10)
China Town</span><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:="" "times="" new="" roman""=""><o:p></o:p></span></p>',
            'status' =>'active', 'url' =>'home/other/local', 'title' =>'Other title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'allow_edit' =>1, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],

        ['id'=>18, 'name'=>'Visa Information','description'=>'Visa description', 'content' =>'<h3 style="text-align: justify; " open="" sans="" condensed",="" sans-serif;="" font-weight:="" 600;="" color:="" rgb(0,="" 0,="" 0);="" font-size:="" 14pt;"=""><span style="font-size: 11px;">﻿</span>Visa Information</h3><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif;">Most nationalities require a visa to visit
Myanmar. Passport holders from Brunei, Cambodia, Indonesia, Laos, Philippines,
Singapore and Vietnam do not require a visa to enter Myanmar for visit up to 14
days. The &nbsp;current &nbsp;regulations for &nbsp;entering &nbsp;Myanmar are
&nbsp;as following:</span><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:="" "times="" new="" roman""=""><o:p>&nbsp;</o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif;"><b><u>1. &nbsp;Individual &nbsp;visa</u></b> &nbsp;&nbsp;</span><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif;">This &nbsp;visa &nbsp;is &nbsp;issued &nbsp;by
&nbsp;a &nbsp;Myanmar &nbsp;Embassy &nbsp;or &nbsp;Consulate. &nbsp;An invitation
&nbsp;letter &nbsp;is &nbsp;not &nbsp;mandatory, &nbsp;and &nbsp;it usually
&nbsp;takes &nbsp;3-5 &nbsp;working &nbsp;days &nbsp;to &nbsp;issue &nbsp;this
&nbsp;visa. &nbsp;Visas issued &nbsp;at &nbsp;Myanmar &nbsp;Embassies &nbsp;are
&nbsp;$20.</span><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:="" "times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><br></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif;"><b><u>2. &nbsp;Package &nbsp;Tour &nbsp;visa </u></b></span><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif;">This &nbsp;visa &nbsp;is &nbsp;issued &nbsp;by
&nbsp;a &nbsp;Myanmar &nbsp;Embassy &nbsp;or &nbsp;Consulate.
&nbsp;&nbsp;&nbsp;It &nbsp;usually &nbsp;takes &nbsp;3-5 &nbsp;days &nbsp;to
&nbsp;issue &nbsp;the &nbsp;visa. </span><span style="font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:="" "times="" new="" roman""=""><o:p>&nbsp;</o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: Zawgyi-One, sans-serif;"><b><u>3. &nbsp;E-Visa </u></b></span><span style="font-family:
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
            'status' =>'active', 'url' =>'home/other/visa', 'title' =>'Other title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'allow_edit' =>1, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],

        ['id'=>19, 'name'=>'Housing Information','description'=>'Housing description', 'content' =>'<h3 style="text-align: justify; line-height: 1.5;" open="" sans="" condensed",="" sans-serif;="" font-weight:="" 600;="" color:="" rgb(0,="" 0,="" 0);="" font-size:="" 14pt;"=""><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span>Housing and Travel</h3><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: 1.5;"><span style="font-family: Zawgyi-One, sans-serif;"><b>Hotel Information</b></span><span style="font-family: Zawgyi-One, sans-serif;">&nbsp;</span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: 1.5;"><span style="font-family: Zawgyi-One, sans-serif;">Reduced Rates at
Official Hotels<o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: 1.5;"><span style="font-family: Zawgyi-One, sans-serif;">Official hotels near
the show have been specially selected for your stay, provided at exclusive discounted
rates. <o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: 1;"><span style="font-family: Zawgyi-One, sans-serif;"><o:p>&nbsp;</o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: 1.5;"><span style="font-family: Zawgyi-One, sans-serif;"><u>Click here to book in
the official hotel block</u></span><span style="font-family: Zawgyi-One, sans-serif;">&nbsp;</span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: 1.5;"><span style="font-family:" zawgyi-one","sans-serif""=""><a href="http://meetings.melia.com/en/IMSC2017.html">http://meetings.melia.com/en/IMSC2017.html</a></span><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: 1;"><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:="" "times="" new="" roman""=""><o:p>&nbsp;</o:p></span></p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: 1.6;"><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:="" "times="" new="" roman""=""><b>Nearby Hotels</b></span>&nbsp;</p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: 1.4;"><span style="font-family:" zawgyi-one","sans-serif""=""><span style="mso-fareast-font-family:
" times="" new="" roman";color:#1155cc"=""><a href="http://www.sedonahotels.com.sg/yangon/">http://www.sedonahotels.com.sg/yangon/</a></span></span></p><p style="line-height: 1.4;">































</p><p class="MsoNormal" style="text-align: justify; margin-bottom: 0.0001pt; line-height: 1.4;"><span style="font-family:" zawgyi-one","sans-serif""=""><a href="http://www.myanmar.micasahotel.com/default-en.html"><span style="mso-fareast-font-family:" times="" new="" roman";color:#1155cc"="">http://www.myanmar.micasahotel.com/default-en.html</span></a></span><span style="font-family:" zawgyi-one","sans-serif";mso-fareast-font-family:"times="" new="" roman""=""><o:p></o:p></span></p>',
            'status' =>'active', 'url' =>'home/other/housing', 'title' =>'Other title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'allow_edit' =>1, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],

        ['id'=>20, 'name'=>'Agenda','description'=>'Agenda', 'content' =>'<table id="agenda-table"><tbody>
        <tr>
         <td colspan="15" class="center-text"><b>PROGRAMME AT A GLANCE (29.8.2017)</b></td>
         <td class="no-border"></td>
        </tr>
       
        <tr>
         <td rowspan="3">Day 1<br>(29.9.2017)<br>Friday</td>
         <td>8:00-9:30</td>
         <td>9:30-10:00</td>
         <td colspan="2">10:00-11:00</td>
         <td colspan="2">11:00-12:00</td>
         <td colspan="2">12:00-13:00</td>
         <td colspan="4">13:00-14:30</td>
         <td>14:30-15:00</td>
         <td>15:00-16:00</td>
        </tr>
       
        <tr>
         <td rowspan="2" class="opening">Opening</td>
         <td rowspan="2" class="vertical-text tea-break"><div class="tea-break-container">Tea break</div></td>
         <td rowspan="2" colspan="2" class="green-cell">Plenary Lecture<br>ACP - Fostering Excellence and Professionalism in Internal Medicine</td>
         <td colspan="2" class="orange-cell">Mini (1) Gastroenterology</td>
         <td rowspan="2" colspan="2" class="light-blue-cell">Lunch  symposium<br>Dermatology</td>
         <td rowspan="2" colspan="4" class="violet-cell">Major (1)<br>Infection<br>TTO</td>
         <td rowspan="2" class="vertical-text tea-break">Tea break</td>
         <td class="orange-cell">Mini (3)<br>Cardiology<br>Sanofi</td>
        </tr>
       
        <tr>
         <td colspan="2" class="orange-cell">Mini (2)<br>Liver</td>
         <td class="orange-cell">Mini (4)<br>Pulmonology<br>GSK</td>
        </tr> 
       
        <tr>
         <td rowspan="3">Day 2<br>(30.9.2017)<br>Saturday</td>
         <td colspan="3">8:30-10:30</td>
         <td>10:30-11:00</td>
         <td colspan="3">11:00-12:30</td>
         <td colspan="2">12:30-13:30</td>
         <td colspan="3">13:30-14:30</td>
         <td>14:30-15:00</td>
         <td>15:00-16:00</td>
         <td>18:00-20:00</td>
        </tr>
       
        <tr>
         <td rowspan="2" colspan="3" class="green-cell">Theme Symposium<br>The Future of Medical Doctors in the ASEAN MRA<br>‘Best Practices’ in 6 ASEAN Countries</td>
         <td rowspan="2" class="vertical-text tea-break">Tea break</td>
         <td colspan="3" class="violet-cell">Major (3)<br>Neurology</td>
         <td rowspan="2" colspan="2" class="light-blue-cell">Lunch  symposium<br>High value care</td>
         <td colspan="3" class="orange-cell">Mini (5)<br>Hypertension and<br>CVD<br>Mega</td>
         <td rowspan="2" class="vertical-text tea-break">Tea break</td>
         <td class="orange-cell">Mini (7)<br>Geriatrics</td>
         <td rowspan="2" class="vertical-text">Gala Dinner</td>
        </tr>
       
        <tr>
         <td colspan="3" class="violet-cell">Major (4)<br>Tuberculosis</td>
         <td colspan="3" class="orange-cell">Mini (6)<br>Stem cell Therapy</td>
         <td class="orange-cell">Mini (8)<br>Oncology</td>
        </tr>
       
        <tr>
         <td rowspan="3">Day 3<br>(1.10.2017)<br>Sunday</td>
         <td colspan="2">8:30-10:00</td>
         <td>10:00-10:30</td>
         <td colspan="2">10:30-11:30</td>
         <td colspan="2">11:30-12:30</td>
         <td colspan="2">12:30-13:30</td>
         <td>13:30-13:45</td>
         <td>13:45-14:00</td>
         <td colspan="2">14:00-15:00</td>
         <td>15:00-16:00</td>
        </tr>
       
        <tr>
         <td colspan="2" class="violet-cell">Major (5)<br>Endocrinology</td>
         <td rowspan="2" class="vertical-text tea-break">Tea break</td>
         <td colspan="2" class="orange-cell">Mini (9)<br>Psychiatry<br>Servier</td>
         <td colspan="2" class="orange-cell">Mini (11)<br>Nephrology</td>
         <td rowspan="2" colspan="2" class="light-blue-cell">Lunch<br>symposium<br>Hematology<br>Sanofi</td>
         <td rowspan="2" class="vertical-text yellow-cell">Paper &amp; poster awards ceremony</td>
         <td rowspan="2" class="vertical-text tea-break">Tea break</td>
         <td rowspan="2" colspan="2" class="light-blue-cell">Clinical Session<br>(4 cases)</td>
         <td rowspan="2" class="light-green-cell">CPC</td>
        </tr>
       
        <tr>
         <td colspan="2" class="violet-cell">Major (6)<br>Nutrition<br>Abbott</td>
         <td colspan="2" class="orange-cell">Mini (10)<br>Rheumatology</td>
         <td colspan="2" class="orange-cell">Mini (12)<br>Toxicology</td>
        </tr>
       </tbody></table>
       
       <h3 class="center-text">18<sup>th</sup> Myanmar Internal Medicine Conference</h3>
       <h3 class="center-text">MIMC 2017</h3>
       <h3 class="center-text">(In Conjunction with 4th AFIM Congress &amp; 4th ACP Southeast Asian Chapter Meeting)</h3>
       <h3 class="center-text">29th Sep - 1st Oct, 2017</h3>
       <h3 class="center-text"><u>TENTATIVE PROGRAMME</u></h3>
       <h3 class="center-text">DAY 1: 29th SEPTEMBER 2017 (FRIDAY)</h3>
       
       <table class="full-width-table">
       <tbody>
       <tr>
         <td width="20%">08:00-09:30</td>
         <td width="80%"><b>Opening Ceremony</b></td>
       </tr>
       <tr>
         <td width="20%"></td>
         <td width="80%">
          <ul>
           <li>Opening Speech by Union Minister, Ministry of Health and Sport</li>
           <li>Welcome Speech by President of IMS, MMA</li>
           <li>Photo session</li>
          </ul>
         </td>
       </tr>
       <tr>
         <td width="20%">09:30-10:00</td>
         <td width="80%"><b>Refreshment</b></td>
       </tr>
       <tr>
        <td colspan="2"><h4><b>Academic Programme</b></h4></td>
       </tr>
       <tr>
         <td width="20%">10:00-11:00</td>
         <td width="80%"><b><u>Plenary Lecture</u></b></td>
       </tr>
       <tr>
         <td width="20%"></td>
         <td width="80%">
          <ul>
           <li>Chairperson: Prof Rai Mra</li><br>
           <li>Topic: ACP – Fostering Excellence and Professionalism in Internal Medicine</li>
           <li>Speaker: Prof. Thomas G Tape - Immediate Past Chair, ACP Board of Regents </li>
          </ul>
         </td>
       </tr>
       <tr>
         <td width="20%">11:00-12:00</td>
         <td width="80%"><b><u>Mini Symposium (1)</u></b></td>
       </tr>
       <tr>
         <td width="20%"></td>
         <td width="80%">
          <i>Gastroenterology</i>
          <ul>
           <li>Chairperson: Prof Thein Myint</li><br>
           <li>Topic: Functional Dyspepsia </li>
           <li>Speaker: Diana Alcantara-Payawal, President-Elect Asian Pacific Study of the Liver</li><br>
           <li>Topic: H. pylori</li>
           <li>Speaker: Prof Nwe Ni</li>
          </ul>
         </td>
       </tr>
       <tr>
         <td width="20%"></td>
         <td width="80%">
          <b><u>Mini Symposium (2)</u></b><br><i>Hepatology</i>
          <ul>
           <li>Chairperson: Prof Khin Mg Win, Prof Kyaw Soe Tun</li><br>
           <li>Topic: Update in management of Non-Alcoholic Fatty Liver Disease (NAFLD)</li>
           <li>Speaker: Prof Naomi</li><br>
           <li>Topic: Update in management of Hepatitis B</li>
           <li>Speaker: Prof Win Naing, Prof Win Win Swe</li>
          </ul>
         </td>
       </tr>
       <tr>
         <td width="20%">12:00-13:00</td>
         <td width="80%"><b><u>Lunch Symposium (1)</u></b></td>
       </tr>
       <tr>
         <td width="20%"></td>
         <td width="80%">
          <i>Dermatology</i>
          <ul>
           <li>Topic: Aesthetic dermatology</li>
           <li>Speaker: Prof Daw Khine Knine Zaw</li>
          </ul>
         </td>
       </tr>
       <tr>
         <td width="20%">12:00-14:30</td>
         <td width="80%"><b><u>Major Symposium (1)</u></b></td>
       </tr>
       <tr>
         <td width="20%"></td>
         <td width="80%">
          <i>Infection</i>
          <ul>
           <li>Chairperson: Prof Htin Aung Saw</li><br>
           <li>Topic: Aesthetic dermatology</li>
           <li>Speaker: Prof Daw Khine Knine Zaw</li><br>
           <li>Topic: Dengue</li>
           <li>Speaker: Prof Amorn Leelarasamee (Thai)</li>
          </ul>
         </td>
       </tr>
       <tr>
         <td width="20%">14:30-15:00</td>
         <td width="80%"><b><u>Refreshment</u></b></td>
       </tr>
       <tr>
         <td width="20%">15:00-16:00</td>
         <td width="80%"><b><u>Mini Symposium (3)</u></b></td>
       </tr>
       <tr>
         <td width="20%"></td>
         <td width="80%">
          <i>Cardiology</i> – Acute Coronary Syndrome
          <ul>
           <li>Chairperson: Prof Khin May San</li><br>
           <li>Topic: Medical Management</li>
           <li>Speaker: Prof Myint Soe Win (UM 2)</li><br>
           <li>Topic: Interventional therapy</li>
           <li>Speaker: Prof Kyaw Soe Win (UMM)</li>
          </ul>
         </td>
       </tr>
       <tr>
         <td width="20%"></td>
         <td width="80%">
          <b><u>Mini Symposium (4)</u></b> <br> <i>Pulmonology </i> – COPD
          <ul>
           <li>Chairperson: Prof Tin Maung Cho</li><br>
           <li>Topic: What’s new in COPD</li>
           <li>Speaker: AP Ng Alan</li><br>
           <li>Topic: Going beyond the lung</li>
           <li>Speaker: Prof Win Naing (Chest)</li>
          </ul>
         </td>
       </tr>
       </tbody></table>
       
       <h3 class="center-text">DAY 2: 30th SEPTEMBER 2017 (SATURDAY)</h3>
       
       <table class="full-width-table">
       <tbody>
       <tr>
         <td width="20%">08:30-10:30</td>
         <td width="80%"><b><u>Theme Symposium</u></b></td>
       </tr>
       <tr>
         <td width="20%"></td>
         <td width="80%">
          <i>The Future of Medical Doctors in the ASEAN MRA</i> <br> (Mutual Recognition Arrangement)
          <ul>
           <li>Chairperson: Prof Ne Win</li><br>
           <li>Topic: The ‘Best Practices’ of the Internal Medicine Training Program in 6 ASEAN Countries</li>
           <li>Speaker: Prof Daw Khine Knine Zaw</li><br>
           <li>Topic: Dengue</li>
           <li>Speakers: 
               <ol type="a">
                  <li>Indonesia (Dr Idrus Alwi)</li>
                  <li>Myanmar (Prof Myo Lwin Nyein)</li>
                  <li>Thailand (AP Thanyachai Sura)</li>
                  <li>Philippines (Dr Nenita Avena-Collantes)</li>
                  <li>Singapore (Dr Sresayampanathan)</li>
                  <li>Malaysia (Dr Letchuman Ramanathan)</li>
               </ol>
           </li>
          </ul>
         </td>
       </tr>
       <tr>
         <td width="20%">10:30-11:00</td>
         <td width="80%"><b><u>Refreshment</u></b></td>
       </tr>
       <tr>
         <td width="20%">11:00-12:30</td>
         <td width="80%">
          <b><u>Major Symposium (2)</u></b>
         </td>
       </tr>
       <tr>
         <td width="20%"></td>
         <td width="80%">
          <i>Neurology for the Internist</i>
          <ul>
           <li>Chairperson: Prof Mi Mi Cho, Prof Win Min Thit</li><br>
           <li>Topic: Approach to movement disorders</li>
           <li>Speaker: Prof Roongroj (Thai)</li><br>
           <li>Topic: Management of Parkinson\'s disease</li>
           <li>Speaker: Prof Louis Tan (Singapore)</li>
          </ul>
         </td>
       </tr>
       <tr>
         <td width="20%"></td>
         <td width="80%">
          <b><u>Major Symposium (3)</u></b> <br> <i>Tuberculosis</i>
          <ul>
           <li>Chairperson: Prof Tin Maung Cho</li><br>
           <li>Topic: Genormic sequencing in TB</li>
           <li>Speaker: Dr Sithu Ag</li><br>
           <li>Topic: Beyond the anti-TB treatment</li>
           <li>Speaker: Prof Win Naing (chest)</li><br>
           <li>Topic: MDR TB / XDR TB–Future options for treatment</li>
           <li>Speaker: Dr Edmund Ong (UK)</li>
          </ul>
         </td>
       </tr>
       <tr>
         <td width="20%">12:30-13:30</td>
         <td width="80%"><b><u>Lunch Symposium (2)</u></b></td>
       </tr>
       <tr>
         <td width="20%"></td>
         <td width="80%">
          <i>High value care</i>
          <ul>
           <li>Chairperson: Prof Pe Thet Khin</li><br>
           <li>Speaker: Prof. Thomas G Tape - Immediate Past Chair, ACP Board of Regents</li>
          </ul>
         </td>
       </tr>
       <tr>
         <td width="20%">13:30-14:30</td>
         <td width="80%"><b><u>Mini Symposium (5)</u></b></td>
       </tr>
       <tr>
         <td width="20%"></td>
         <td width="80%">
          <i>Hypertension and CVD</i>
          <ul>
           <li>Chairperson: Prof Nwe Nwe</li><br>
           <li>Topic: Cardiovascular Risk Factors” (or) “Stable Coronary Artery Disease</li>
           <li>Speaker: Prof. Aaron Wong (Singapore)</li><br>
           <li>Topic: How to Manage Hypertensive Emergencies and Urgencies</li>
           <li>Speaker: MARIANO B. LOPEZ</li>
          </ul>
         </td>
       </tr>
       <tr>
         <td width="20%"></td>
         <td width="80%">
          <b><u>Mini Symposium (6)</u></b> <br> <i>Stem cell Therapy</i>
          <ul>
           <li>Chairperson: Prof Theingi Myint</li><br>
           <li>Speakers: 
             <ol>
               <li>Professor Kyu Kyu Mg</li>
               <li>Foreign speaker – Dr Veerapol Khemarangsan</li>
             </ol>
           </li>
          </ul>
         </td>
       </tr>
       <tr>
         <td width="20%">14:30-15:00</td>
         <td width="80%"><b><u>Refreshment</u></b></td>
       </tr>
       <tr>
         <td width="20%">15:00-16:00</td>
         <td width="80%"><b><u>Mini Symposium (7)</u></b></td>
       </tr>
       <tr>
         <td width="20%"></td>
         <td width="80%">
          <i>Geriatrics</i>
          <ul>
           <li>Chairperson: Prof Nyunt Thein</li><br>
           <li>Topic: Healthy Aging</li>
           <li>Speaker: AP Min Zaw Oo</li><br>
           <li>Topic: Frailty Assessment and Crisis Interventions</li>
           <li>Speaker: Dr Moe Thaw Oo (UK)</li>
          </ul>
         </td>
       </tr>
       <tr>
         <td width="20%"></td>
         <td width="80%">
          <b><u>Mini Symposium (8)</u></b> <br> <i>Oncology</i>
          <ul>
           <li>Chairperson: Prof Soe Aung</li><br>
           <li>Topic: Screening for Treatable Cancers</li>
           <li>Speaker: Prof Yin Yin Htun</li><br>
           <li>Topic: Oncologic Medical Emergencies for the Internists</li>
           <li>Speaker: Prof Richard (Singapore)</li>
          </ul>
         </td>
       </tr>
       <tr>
         <td width="20%">18:00-20:00</td>
         <td width="80%"><b><u>Gala Dinner</u></b></td>
       </tr>
       </tbody>
       </table>
       
       <h3 class="center-text">DAY 3:1st OCTOBER 2017 (SUNDAY)</h3>
       
       <table class="full-width-table">
       <tbody>
       <tr>
         <td width="20%">08:30-10:00</td>
         <td width="80%"><b><u>Major Symposium (4)</u></b></td>
       </tr>
       <tr>
         <td width="20%"></td>
         <td width="80%">
          <i>Endocrinology</i>
          <ul>
           <li>Chairperson: Prof Than Than Aye, Prof Tint Swe Latt</li><br>
           <li>Topic: New perspectives on Conventional Therapies</li>
           <li>Speaker: Prof. CECILIA A. JIMENO</li><br>
           <li>Topic: Choosing the right diuretic for the management of diabetic hypertension</li>
           <li>Speaker: Prof Ko Ko</li>
          </ul>
         </td>
       </tr>
       <tr>
         <td width="20%"></td>
         <td width="80%">
          <b><u>Major Symposium (5)</u></b> <br> <i>Nutrition</i>
          <ul>
           <li>Chairperson: Prof Zaw Lynn Aung</li><br>
           <li>Topic: Diet for combating obesity</li>
           <li>Speaker: Dr Ei Mon Phyo from UOPH – Nutrition department</li><br>
           <li>Topic: The Perioperative Diet</li>
           <li>Speaker: Prof Ling (Singapore)</li><br>
           <li>Topic: Nutrition in the Critically Ill Patients</li>
           <li>Speaker: Ms Loh Wing Nie (Singapore)</li>
          </ul>
         </td>
       </tr>
       <tr>
         <td width="20%">10:00-10:30</td>
         <td width="80%"><b><u>Refreshment</u></b></td>
       </tr>
       <tr>
         <td width="20%">10:30-11:30</td>
         <td width="80%"><b><u>Mini Symposium (9)</u></b></td>
       </tr>
       <tr>
         <td width="20%"></td>
         <td width="80%">
          <i>Psychiatry</i>
          <ul>
           <li>Chairperson: Prof Zaw Lynn Aung, Prof Tin Oo</li><br>
           <li>Topic: Role of family in management of depression</li>
           <li>Speaker: Dr Thet Zaw</li><br>
           <li>Topic: Biological management of depression</li>
           <li>Speaker: Dr Roger Ho (Singapore)</li>
          </ul>
         </td>
       </tr>
       <tr>
         <td width="20%"></td>
         <td width="80%">
          <b><u>Mini Symposium (10)</u></b> <br> <i>Rheumatology</i>
          <ul>
           <li>Chairperson: Prof Yan Lin Myint</li><br>
           <li>Topic: Biologic use in Rhematoid Arthritis</li>
           <li>Speaker: Prof Chit Soe</li><br>
           <li>Topic:Synoviolin as a novel factor for Rhematoid Arthritis, chronic inflammation and metabolic disorders</li>
           <li>Speaker: Prof. Toshihiro Nakajima (Japan)</li>
          </ul>
         </td>
       </tr>
       <tr>
         <td width="20%">11:30-12:30</td>
         <td width="80%"><b><u>Mini Symposium (11)</u></b></td>
       </tr>
       <tr>
         <td width="20%"></td>
         <td width="80%">
          <i>Nephrology</i>
          <ul>
           <li>Chairperson: Prof Khin Mg Mg Than,  Prof Khin Mg Htay</li><br>
           <li>Topic: Approach to Hyponatremia</li>
           <li>Speaker: Prof Khin Thida Thwin</li><br>
           <li>Topic: Strategies to Slow Down the Progression of CKD</li>
           <li>Speaker: Dr Russel Robert</li>
          </ul>
         </td>
       </tr>
       <tr>
         <td width="20%"></td>
         <td width="80%">
          <b><u>Mini Symposium (12)</u></b> <br> <i>Toxicology</i>
          <ul>
           <li>Chairperson: Prof Myo Lwin Nyein</li><br>
           <li>Topic: Initial Management of Common Poisoning in the Emergency Room</li>
           <li>Speaker: Prof Erni Juwita Nelwan  (The Indonesian Society of Internal Medicine)</li><br>
           <li>Topic:Toxinology</li>
           <li>Speaker: Prof Jullian White</li>
          </ul>
         </td>
       </tr>
       <tr>
         <td width="20%">12:30-13:30</td>
         <td width="80%">
          <b><u>Lunch Symposium (3)</u></b>
         </td>
       </tr>
       <tr>
         <td width="20%"></td>
         <td width="80%">
         <i>Hematology</i>
          <ul>
           <li>Chairperson: Prof Aye Aye Myint</li><br>
           <li>Topic: Basic Interpretation of CBC, RBC indices, and Clotting Parameters</li>
           <li>Speaker: Prof. Htun Lwin Nyein</li><br>
           <li>Topic: Approach to Anemia</li>
           <li>Speaker: AP Sein Win</li>
          </ul>
         </td>
       </tr>
       <tr>
         <td width="20%">13:30-13:45</td>
         <td width="80%"><b><u>Paper and Poster award ceremony</u></b></td>
       </tr>
       <tr>
         <td width="20%">13:45-14:00</td>
         <td width="80%"><b><u>Refreshment</u></b></td>
       </tr>
       <tr>
         <td width="20%">14:00-15:00</td>
         <td width="80%"><b><u>Clinical Session</u></b></td>
       </tr>
       <tr>
         <td width="20%">15:00-16:00</td>
         <td width="80%"><b><u>CPC</u></b></td>
       </tr>
       </tbody>
       </table>
       <br>
       <p><b>Free Paper</b> - Parallel with symposia in different room</p>',
            'status' =>'active', 'url' =>'home/conference/agenda', 'title' =>'Agenda', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'allow_edit' =>1, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],

        ['id'=>21, 'name'=>'Speakers','description'=>'Speakers', 'content' =>'<p><span style="font-size: 14px;">﻿</span><span style="font-size: 14px;">﻿</span><span style="font-size: 14px;">﻿</span><span style="font-family: Zawgyi-One, sans-serif; font-size: 14px;">To be confirmed.</span><br></p>',
            'status' =>'active', 'url' =>'home/conference/speakers', 'title' =>'Speakers', 'page_menu_order' =>'2', 'events_id' =>'1', 'templates_id' =>'1', 'allow_edit' =>1, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],

        ['id'=>22, 'name'=>'Committees','description'=>'Committees', 'content' =>'<h4><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><b><u>Organizing Committee</u></b></h4>
        <table class="committee-table">
        <tbody>
        <tr>
          <td colspan="2"><b>Chair</b></td>
        </tr>
        <tr valign="top">
          <td width="25%">Prof Myo Lwin Nyein</td>
          <td width="75%">
            <ul>
              <li>Professor &amp; Head, Department of Medicine, University of Medicine 2</li>
              <li><a href="http://mlnyein59@gmail.com">mlnyein59@gmail.com</a></li>
            </ul>
          </td>
        </tr>
        <tr>
          <td colspan="2"><b>Vice Chair</b></td>
        </tr>
        <tr valign="top">
          <td width="25%">Prof Htin Aung Saw</td>
          <td width="75%">
            <ul>
              <li>Retired Professor, Tropical Medicine, University of Medicine 2</li>
              <li><a href="http://htinaungsaw@gmail.com">htinaungsaw@gmail.com</a></li>
            </ul>
          </td>
        </tr>
        <tr valign="top">
          <td width="25%">Prof Yan Lynn Myint </td>
          <td width="75%">
            <ul>
              <li>Professor &amp; Head, Department of Medicine, University of Medicine Mandalay</li>
              <li><a href="http://yanlynnmyint@gmail.com">yanlynnmyint@gmail.com</a></li>
            </ul>
          </td>
        </tr>
        <tr>
          <td colspan="2"><b>Secretary General</b></td>
        </tr>
        <tr valign="top">
          <td width="25%">AP Dr Thein Myint</td>
          <td width="75%">
            <ul>
              <li>Associate Professor, Department of Medicine, University of Medicine 1</li>
              <li><a href="http://drthanemyint@gmail.com">drthanemyint@gmail.com</a></li>
            </ul>
          </td>
        </tr>
        <tr>
        </tr></tbody></table>
        
        <h4><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><b><u>Academic Committee</u></b></h4>
        <table class="committee-table">
        <tbody>
        <tr>
          <td colspan="2"><b>Chair</b></td>
        </tr>
        <tr valign="top">
          <td width="25%">Prof Zaw Lynn Aung </td>
          <td width="75%">
            <ul>
              <li>Professor &amp; Head, Department of Medicine, University of Medicine 1</li>
              <li><a href="http://zawlynna@gmail.com">zawlynna@gmail.com</a></li>
            </ul>
          </td>
        </tr>
        <tr>
          <td colspan="2"><b>Vice Chair</b></td>
        </tr>
        <tr valign="top">
          <td width="25%">Prof Nwe Nwe Win</td>
          <td width="75%">
            <ul>
              <li>Professor  &amp; Head, Department of Medicine, Defense Service Medical Academy</li>
              <li><a href="http://profnwenwewin@gmil.com">profnwenwewin@gmil.com</a></li>
            </ul>
          </td>
        </tr>
        <tr valign="top">
          <td width="25%">Prof Win Min Thit</td>
          <td width="75%">
            <ul>
              <li>Professor  &amp; Head, Neurology Department, University of Medicine 1</li>
              <li><a href="http://wminthit@gmail.com">wminthit@gmail.com</a></li>
            </ul>
          </td>
        </tr>
        <tr>
          <td colspan="2"><b>Secretary</b></td>
        </tr>
        <tr valign="top">
          <td width="25%">AP Dr Moe Naing </td>
          <td width="75%">
            <ul>
              <li>Associate Professor, Department of Medicine, University of Medicine 1</li>
              <li><a href="http://drmoenaing@gmail.com">drmoenaing@gmail.com</a></li>
            </ul>
          </td>
        </tr>
        <tr>
        </tr></tbody></table>
        
        <h4><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><b><u>Credential Committee</u></b></h4>
        <table class="committee-table">
        <tbody>
        <tr>
          <td colspan="2"><b>Chair</b></td>
        </tr>
        <tr valign="top">
          <td width="25%">Prof Than Than Aye (GI)</td>
          <td width="75%">
            <ul>
              <li>Professor &amp; Head, Department of Gastroenterology, University of Medicine 2</li>
              <li><a href="http://ttaye06@gmail.com">ttaye06@gmail.com</a></li>
            </ul>
          </td>
        </tr>
        <tr>
          <td colspan="2"><b>Vice Chair</b></td>
        </tr>
        <tr valign="top">
          <td width="25%">Prof Khaing Khaing Zaw</td>
          <td width="75%">
            <ul>
              <li>Professor &amp; Head, Department of Dermatology, University of Medicine 1</li>
            </ul>
          </td>
        </tr>
        <tr>
          <td colspan="2"><b>Secretary</b></td>
        </tr>
        <tr valign="top">
          <td width="25%">AP Dr Khin San Aye</td>
          <td width="75%">
            <ul>
              <li>Professor, Department of Gastroenterology, University of Medicine 2</li>
              <li><a href="http://ksaye.08@gmail.com">ksaye.08@gmail.com</a></li>
            </ul>
          </td>
        </tr>
        <tr>
        </tr></tbody></table>
        
        <h4><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><b><u>Reception Committee</u></b></h4>
        <table class="committee-table">
        <tbody>
        <tr>
          <td colspan="2"><b>Chair</b></td>
        </tr>
        <tr valign="top">
          <td width="25%">Prof Hlaing Mya Win</td>
          <td width="75%">
            <ul>
              <li>Professor, Department of Medicine, University of Medicine 1</li>
              <li><a href="http://dr.hlaingmyawin2012@gmail.com">dr.hlaingmyawin2012@gmail.com</a></li>
            </ul>
          </td>
        </tr>
        <tr>
          <td colspan="2"><b>Vice Chair</b></td>
        </tr>
        <tr valign="top">
          <td width="25%">Prof Cho Mar Hlaing</td>
          <td width="75%">
            <ul>
              <li>Professor, Department of Medicine, University of Medicine 2</li>
              <li><a href="http://cmhkkz@gmail.com">cmhkkz@gmail.com</a></li>
            </ul>
          </td>
        </tr>
        <tr>
          <td colspan="2"><b>Secretary</b></td>
        </tr>
        <tr valign="top">
          <td width="25%">AP Hein Yarzar Aung</td>
          <td width="75%">
            <ul>
              <li>Associate Professor, Department of Medicine, University of Medicine 1</li>
              <li><a href="http://hyarzaraung@gmail.com">hyarzaraung@gmail.com</a></li>
            </ul>
          </td>
        </tr>
        </tbody></table>
        
        <h4><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><b><u>Publicity Committee</u></b></h4>
        <table class="committee-table">
        <tbody>
        <tr>
          <td colspan="2"><b>Chair</b></td>
        </tr>
        <tr valign="top">
          <td width="25%">Prof Nan Phyu Phyu Aung</td>
          <td width="75%">
            <ul>
              <li>Professor, Department of Medicine, University of Medicine 2</li>
              <li><a href="http://drnanphyuphyuaung310@gmail.com">drnanphyuphyuaung310@gmail.com</a></li>
            </ul>
          </td>
        </tr>
        <tr>
          <td colspan="2"><b>Vice Chair</b></td>
        </tr>
        <tr valign="top">
          <td width="25%">Prof Khin Phyu Pyar</td>
          <td width="75%">
            <ul>
              <li>Professor, Department of Medicine, Defense Service Medical Academy</li>
              <li><a href="http://khinphyupyar@gmail.com">khinphyupyar@gmail.com</a></li>
            </ul>
          </td>
        </tr>
        <tr>
          <td colspan="2"><b>Secretary</b></td>
        </tr>
        <tr valign="top">
          <td width="25%">Dr Phyo Thiha</td>
          <td width="75%">
            <ul>
              <li>Lecturer, Department of Medicine, University of Medicine 2</li>
              <li><a href="http://thihaphyodr@gmail.com">thihaphyodr@gmail.com</a></li>
            </ul>
          </td>
        </tr>
        <tr>
        </tr></tbody></table>
        
        <h4><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><b><u>Sport Committee</u></b></h4>
        <table class="committee-table">
        <tbody>
        <tr>
          <td colspan="2"><b>Chair</b></td>
        </tr>
        <tr valign="top">
          <td width="25%">Prof U Chit Soe</td>
          <td width="75%">
            <ul>
              <li>Professor &amp; Head, Rheumatology Department, University of Medicine 1</li>
              <li><a href="http://prof.chit@gmail.com">prof.chit@gmail.com</a></li>
            </ul>
          </td>
        </tr>
        <tr>
          <td colspan="2"><b>Secretary</b></td>
        </tr>
        <tr valign="top">
          <td width="25%">Dr Lei Lei Htay</td>
          <td width="75%">
            <ul>
              <li>Consultant, Rheumatology Department, University of Medicine 1</li>
              <li><a href="http://leileihtay@gmail.com">leileihtay@gmail.com</a></li>
            </ul>
          </td>
        </tr>
        <tr>
        </tr></tbody></table>
        
        <h4><span style="font-size: 11px;">﻿</span><span style="font-size: 11px;">﻿</span><b><u>Financial Committee</u></b></h4>
        <table class="committee-table">
        <tbody>
        <tr>
          <td colspan="2"><b>Chair</b></td>
        </tr>
        <tr valign="top">
          <td width="25%">Prof Mar Mar Kyi</td>
          <td width="75%">
            <ul>
              <li>Professor, Department of Medicine, University of Medicine 2</li>
              <li><a href="http://drmmkyi@gmail.com">drmmkyi@gmail.com</a></li>
            </ul>
          </td>
        </tr>
        <tr>
          <td colspan="2"><b>Secretary</b></td>
        </tr>
        <tr valign="top">
          <td width="25%">Dr Nan Phyu Sin Toe Myint</td>
          <td width="75%">
            <ul>
              <li>Assistant Lecturer, Department of Medicine, University of Medicine 2</li>
              <li><a href="http://phyujasmine23@gmail.com">phyujasmine23@gmail.com</a></li>
            </ul>
          </td>
        </tr>
        <tr>
        </tr></tbody></table>',
            'status' =>'active', 'url' =>'home/conference/committees', 'title' =>'Committees', 'page_menu_order' =>'3', 'events_id' =>'1', 'templates_id' =>'1', 'allow_edit' =>1, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],

        ['id'=>23, 'name'=>'Secretariat','description'=>'Secretariat', 'content' =>'<p><span style="font-size: 14px;">﻿</span><span style="font-size: 14px;">﻿</span><span style="font-size: 14px;">﻿</span><span style="font-family: Zawgyi-One, sans-serif; font-size: 14px;">To be confirmed.</span><br></p>',
            'status' =>'active', 'url' =>'home/conference/secretariat', 'title' =>'Secretariat', 'page_menu_order' =>'4', 'events_id' =>'1', 'templates_id' =>'1', 'allow_edit' =>1, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],

        ['id'=>24, 'name'=>'Contact Us','description'=>'Contact Us', 'content' =>'<p class="MsoNormal"><span style="font-size: 14px;">﻿</span><span style="font-size:12.0pt;line-height:107%;font-family:
" zawgyi-one","sans-serif""=""><span style="font-size: 14px;">For sponsorship information: Prof Mar Mar Kyi :&nbsp;</span><drmmkyi@gmail.com><o:p></o:p></drmmkyi@gmail.com></span><span style="font-family: Zawgyi-One, sans-serif; font-size: 14px;"><a href="http://treasurer@internalmedicinesocietymyanmar.com">treasurer@internalmedicinesocietymyanmar.com</a></span></p><p><span style="font-size: 14px;">

</span><span style="font-size:12.0pt;line-height:107%;font-family:" zawgyi-one","sans-serif";="" mso-fareast-font-family:calibri;mso-fareast-theme-font:minor-latin;mso-ansi-language:="" en-us;mso-fareast-language:en-us;mso-bidi-language:ar-sa"=""><span style="font-size: 14px;">For conference
information: AP Thein Myint :&nbsp;</span><a href="http://drthanemyint@gmail.com"><span style="font-size: 14px;">drthanemyint@gmail.com</span></a></span><br></p><p><br></p>',
            'status' =>'active', 'url' =>'home/conference/contactus', 'title' =>'Contact Us', 'page_menu_order' =>'5', 'events_id' =>'1', 'templates_id' =>'1', 'allow_edit' =>1, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],

        ['id'=>25, 'name'=>'Register Entry','description'=>'Register Entry', 'content' =>'',
            'status' =>'active', 'url' =>'register/create', 'title' =>'Register entry title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'allow_edit' =>0, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],

        ['id'=>26, 'name'=>'Abstract Entry','description'=>'Abstract Entry', 'content' =>'',
            'status' =>'active', 'url' =>'abstractform/create', 'title' =>'Abstract entry title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'allow_edit' =>0, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
    );

    DB::table('pages')->insert($objs);
}
}