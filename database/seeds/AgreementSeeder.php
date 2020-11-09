<?php

use Illuminate\Database\Seeder;

class AgreementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $serviceAgreement = '
        <div class="row">
        <div class="col-md-6 mb-2 ml-auto mr-auto">
        <div class="card bg-info">
        <div class="card-header">
        <h3 class="text-center"><b>Service Agreement</b></h3>
        </div>
        <p>This document, hereafter referred to as the <b>Service Agreement</b>, sets forth the expectations of both the <b>Client</b> as well as <b>Bertram Technologies Corporation</b> in any business that may hereupon be conducted.</p>
        <p>A <b>Glossary of Terms</b> can be read below this document defining each keyword contained herein.</p>
        <p><b>Bertram Technologies Corporation</b> hereon agrees to comply with all local, state and federal laws governing the use, retention and protection of <b>Personal</b> or <b>Proprietary Data</b>, and comply with the <b>Privacy Policy</b> set forth on this site.</p>
        <p><b>Bertram Technologies Corporation</b> will never sell or share <b>Personal</b> or <b>Proprietary Data</b> collected from <b>Client</b>s without the <b>Client’s</b> permission, notwithstanding any <b>Lawful Order</b> from any United States <b>Court</b>, and will only use <b>Personal</b> or <b>Proprietary Data</b> for the purposes outlined herein.</p>
        <p>During the course of delivering <b>Services</b>, certain <b>Personal</b> or <b>Proprietary Data</b> may need to be collected in order to complete a <b>Project</b> on behalf of a <b>Client</b>. This <b>Personal</b> or <b>Proprietary Data</b> collection will only occur with the approval of the <b>Client</b> and for the purposes agreed to within this document and within the <b>Privacy Policy</b>.</p>
        <p>To secure <b>Services</b>, a <b>Client</b> may need to submit a refundable deposit, only after which <b>Services</b> will be rendered; this deposit will be refundable in full only before <b>Services</b> are rendered. In the event the <b>Client</b> does not wish to move forward with a <b>Project</b>, the deposit will be refunded in full within 3 days of <b>Project</b> termination. This cannot account for processing times that occur after <b>Bertram Technologies Corporation</b> has initiated the refund.</p>
        <p>The <b>Cost</b> of a <b>Project</b> will be calculated before <b>Project</b> <b>Commencement</b> and will be equal to the Quote which the <b>Client</b> will be provided before <b>Project</b> <b>Commencement</b>.</p>
        <p><b>Cost</b> may be adjusted according to changing <b>Project</b> Requirements. In the event this is necessary, <b>Bertram Technologies Corporation</b> will send the <b>Client</b> a <b>Cost Adjustment</b> and obtain approval from the <b>Client</b> before continuing work.</p>
        <p>After a <b>Project</b> has been completed, or abandoned, the <b>Client</b> will be invoiced. If the <b>Client</b> does not pay their balance in full within seven days of <b>Project</b> completion, <b>Bertram Technologies Corporation</b> reserves the right to terminate irrecoverably any work on any unpaid <b>Project</b>. In addition, the contents, designs and concepts contained in any unpaid <b>Project</b> that has passed the payment period will belong to <b>Bertram Technologies Corporation</b>.</p>
        <p>There may be arrangements in which <b>Bertram Technologies Corporation</b> and the <b>Client</b> agree to terms other than what are stated in this <b>Service Agreement</b>, which must be individually and explicitly noted in the <b>Client’s</b> account.</p>
        <p>The terms set forth in this <b>Service Agreement</b> are legally binding, and are presumed mutually agreed to by all parties unless otherwise explicitly noted before <b>Project</b> <b>Commencement</b>.</p>
        <p>It shall be assumed that the <b>Client</b> has read and acknowledged this <b>Service Agreement</b> and all articles herein, and will electronically sign a dated <b>Acknowledgement</b> before first <b>Project</b> <b>Commencement</b>, an individualized copy of which will be kept on file, and a copy sent to the <b>Client</b>.</p>
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6 mb-2 ml-auto mr-auto">
        <div class="card bg-info">
        <div class="card-header">
        <h3 class="text-center"><b>Glossary of Terms</b></h3>
        </div>
        <p><b>Bertram Technologies Corporation</b>: Company providing work pursuant to this <b>Service Agreement</b></p>
        <p><b>Service Agreement</b>: Document outlining the terms by which <b>Bertram Technologies Corporation</b> and the <b>Client</b> will abide during their business relationship</p>
        <p><b>Client</b>: Seeker of <b>Services</b> from <b>Bertram Technologies Corporation</b></p>
        <p><b>Glossary of Terms</b>: Section defining key terms used in the <b>Service Agreement</b></p>
        <p><b><b>Personal</b> Data</b>: Data containing <b>Personal</b>ly identifying information, including but not limited to name, phone number, e-mail address</p>
        <p><b>Proprietary Data</b>: Data containing confidential, company-related <b>Client</b> information, including but not limited to processes, methods, designs, or trademarked or copyrighted materials</p>
        <p><b>Lawful Order</b>: Any order from any United States <b>Court</b> to compel the release of <b>Client</b> information by <b>Bertram Technologies Corporation</b></p>
        <p><b>Court</b>: Any United States <b>Court</b></p>
        <p><b>Services</b>: Any offering made pursuant to the <b>Service Agreement</b> to provide value to the <b>Client</b></p>
        <p><b>Project</b>: A proposal by a <b>Client</b> including its requirements and any notation, <b>Cost</b> information, and any other information contained and related therein</p>
        <p><b>Project Requirements</b>: Specifications made by the <b>Client</b> as to how the <b>Project</b> should be developed</p>
        <p><b>Privacy Policy</b>: Document stating the privacy and information rights of users on this site</p>
        <p><b>Cost</b>: A monetary amount representing a charge made to and owed by the <b>Client</b></p>
        <p><b>Cost Adjustment</b>: An increase or decrease in <b>Cost</b> made by <b>Bertram Technologies Corporation</b> within a <b>Project</b> according to increased or decreased <b>Client</b> needs</p>
        <p><b>Commencement</b>: The period beginning work on a <b>Project</b></p>
        <p><b>Acknowledgement</b>: A signed statement attesting to the <b>Client’s</b> having read and accepted the foregoing <b>Service Agreement</b> and all articles contained therein on the date signed</p>
        </div>
        </div>
        </div>';
        $privacyPolicy = '
        <div class="col-md-6 mb-2 ml-auto mr-auto">
    <div class="card bg-info">
        <div class="card-header">
            <h3 class="text-center"><b>Privacy Policy</b></h3>
        </div>
    <p>Bertram Technologies Corporation operates the www.bertramtechnologies.com website, which provides the SERVICE.</p>
    
    <p>This page is used to inform website visitors regarding our policies with the collection, use, and disclosure of Personal Information if anyone decided to use our Service, the Bertram Technologies Corporation website.</p>
    
    <p>If you choose to use our Service, then you agree to the collection and use of information in relation with this policy. The Personal Information that we collect are used for providing and improving the Service. We will not use or share your information with anyone except as described in this Privacy Policy.</p>
    
    <p>The terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, which is accessible at www.bertramtechnologies.com, unless otherwise defined in this Privacy Policy. Our Privacy Policy was created with the help of the Privacy Policy Template.</p>
    <b class="text-center">Information Collection and Use</b><br><br>
    
    <p>For a better experience while using our Service, we may require you to provide us with certain personally identifiable information, including but not limited to your name, phone number, and postal address. The information that we collect will be used to contact or identify you.</p>
    <b class="text-center">Log Data</b><br><br>
    
    <p>We want to inform you that whenever you visit our Service, we collect information that your browser sends to us that is called Log Data. This Log Data may include information such as your computer’s Internet Protocol ("IP") address, browser version, pages of our Service that you visit, the time and date of your visit, the time spent on those pages, and other statistics.</p>
    <b class="text-center">Cookies</b><br><br>
    
    <p>Cookies are files with small amount of data that is commonly used an anonymous unique identifier. These are sent to your browser from the website that you visit and are stored on your computer’s hard drive.</p>
    
    <p>Our website uses these "cookies" to collection information and to improve our Service. You have the option to either accept or refuse these cookies, and know when a cookie is being sent to your computer. If you choose to refuse our cookies, you may not be able to use some portions of our Service.</p>
    
    <b class="text-center">Service Providers</b><br><br>
    
    <p>We may employ third-party companies and individuals due to the following reasons:<br>
    
        To facilitate our Service;<br>
        To provide the Service on our behalf;<br>
        To perform Service-related services; or<br>
        To assist us in analyzing how our Service is used.<br><br>
    
    <p>We want to inform our Service users that these third parties <i>may</i> have access to your Personal Information. The reason is to perform the tasks assigned to them on our behalf. However, <u>they are obligated not to disclose or use the information for any other purpose</u>.</p>
    <b class="text-center">Security</b><br><br>
    
    <p>We value your trust in providing us your Personal Information, thus we are striving to use commercially acceptable means of protecting it. But remember that no method of transmission over the internet, or method of electronic storage is 100% secure and reliable, and we cannot guarantee its absolute security.</p>
    <b class="text-center">Links to Other Sites</b><br><br>
    
    <p>Our Service may contain links to other sites. If you click on a third-party link, you will be directed to that site. Note that these external sites are not operated by us. Therefore, we strongly advise you to review the Privacy Policy of these websites. We have no control over, and assume no responsibility for the content, privacy policies, or practices of any third-party sites or services.</p>
    
    <b class="text-center">Children’s Privacy</b><br><br>
    
    <p>Our Services do not address anyone under the age of 13. We do not knowingly collect personal identifiable information from children under 13. In the case we discover that a child under 13 has provided us with personal information, we immediately delete this from our servers. If you are a parent or guardian and you are aware that your child has provided us with personal information, please contact us so that we will be able to ensure proper deletion of that information.</p>
    <b class="text-center">Changes to This Privacy Policy</b><br><br>
    
    <p>We may update our Privacy Policy from time to time. Thus, we advise you to review this page periodically for any changes. We will notify you of any changes by posting the new Privacy Policy on this page. These changes are effective immediately, after they are posted on this page.</p>
    <b class="text-center">Contact Us</b><br><br>
    
    <p>If you have any questions or suggestions about our Privacy Policy, do not hesitate to <a class="text-dark" href={{ route(\'contact\') }}>contact us</a>.</p>
        </div>
    </div>
        ';
        DB::table('agreements')->insert(['service_agreement' => $serviceAgreement, 'privacy_policy' => $privacyPolicy]);

    }
}
