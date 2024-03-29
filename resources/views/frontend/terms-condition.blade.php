<!doctype html>
<html lang="en">
  <head>
  <title> MapBirdy Terms and Condition</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('public/frontend/images/Favocon.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <!-- <link href="{{ asset('public/frontend/css/login.css') }}" rel="stylesheet" type="text/css"> -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
.texts{
    text-align:left
}
.navspace {
    margin-left: 535px;
    font-size: 20px;
    justify-content: center;
    margin-top: 74px;
}
.cards{
    padding: 15px;
    text-align:justify;
    line-height: 1;
    font-family:sans-serif;
    text-transform: inherit;
  
    
}
.lazy{
    padding: 15px;
}
.bg-light {
    background-color: #f8f9fa!important;
    margin-top: -18px;
}
.sty{
    margin-top:50px;
   
}
.nav-link {
  box-shadow: inset 0 0 0 0 #54b3d6;
  color: #01b2FF !important;
  transition: color .3s ease-in-out, box-shadow .3s ease-in-out;
  font-family:sans-serif;
  

}
.nav-link:hover{
        
        box-shadow: inset 120px 0 0 0 #01b2FF;
        color: #ffffff !important;
}
.navb{
    margin-top:50px;
    margin-right:5px;
    padding:5px;
}


</style>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-BJ03FN4K68"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-BJ03FN4K68');
</script>
</head>
  <body>
    <?php
//     $id = Auth::guard('users')->user()->id;
// $name = Auth::guard('users')->user()->name;
// $email = Auth::guard('users')->user()->email;
// print_r($email);
// die;
?>

 <div class="shadow">
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">
  <img src="{{ asset('public/frontend/images/mainLOGO.png') }}" height="100px" width="300px" class="img-fluid" alt="MapBirdy">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end navb" id="navbarNav">
  @if (Auth::guard('users')->user())
    <ul class="navbar-nav">
      <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">DASHBOARD<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="{{ URL('contact') }}">CONTACT US</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="{{ URL('profile') }}">PROFILE</a> 
      </li>
      <li class="nav-item">
      <a class="nav-link" href="{{ URL('logout') }}">SIGNOUT</a>
      </li>
    </ul>
  </div>
  @else

<a  class="nav-link" href="{{ URL('') }}">LOGIN</a>
<a class="nav-link" href="{{ URL('registration') }}">SIGNUP</a>

    
@endif
</nav>
</div>




  <div class="container-fluid">
    <div class="row">
  
        
        <div class="col-md-12">
       
     
<div class="cards">

<p class="texts text-center" ><span style='font-size:48px;font-family:"Helvetica Neue";color:#000000; '>Terms of Service</p>
<p class="texts text-center" style='font-family:" sans-serif;'>Last Updated on June 15, 2023</p>
<p><span style='font-family:" sans-serif;'>Thank you for signing up to use our Service, MapBirdy, which will be referred to as (  name  ,  us  , we   or  our  ). The term  you   refers to the person or entity accessing or otherwise using our Service. </span></p>
<p ><span style='font-family:" sans-serif;'>This Terms of Service Agreement (or  Terms   for short) describes the guidelines of MapBirdy's relationship with you and is a legal agreement, so please read it carefully. </span></p>
<p ><span style='font-family:" sans-serif;'>BY CLICKING THE SIGN UP& BUTTON, COMPLETING THE SIGN UP PROCESS, OR USING OUR SERVICE, YOU REPRESENT THAT YOU HAVE READ, UNDERSTAND, AND AGREE TO BE BOUND BY THESE TERMS. IF YOU DO NOT AGREE WITH THESE TERMS, PLEASE DO NOT USE THESE SERVICES. </span></p>
<p > <h3><span style='font-family:" sans-serif;'>1.  Who can use the service</span> </h3><span style='font-family:" sans-serif;'> </span></p>
<p ><span style='font-family:" sans-serif;'>To use MapBirdy, you must be at least 13 years old (or such other age as determined by your jurisdiction). If you are not yet legally considered an adult where you live (known as the age of majority), you may only use the Service if your parent or guardian agrees to these Terms on your behalf. </span></p>
<p ><span style='font-family:" sans-serif;'> By using MapBirdy, you state that: </span></p>
<p ><span style='font-family:" sans-serif;'>   <li>      You can form a binding contract with MapBirdy</span></p>
<p ><span style='font-family:" sans-serif;'>   <li>      You are not a convicted sex offender</span></p>
<p ><span style='font-family:" sans-serif;'>   <li>      You will comply with these Terms and all applicable local, state, national and international laws, rules and regulations. </span></p>
<p ><span style='font-family:" sans-serif;'>  <h3>2.               Your rights to use the service </h3> </span></p>
<p ><span style='font-family:" sans-serif;'>Subject to your compliance with these Terms, and any other policies we make available to you from time to time, MapBirdy grants you a personal, worldwide, royalty-free, non- transferable, non-exclusive, revocable, non-sublicensable license to access and use the Service. </span></p>
<p ><span style='font-family:" sans-serif;'>You agree that any software that we provide you, including the MapBirdy application, may automatically download and install upgrades, updates or other new features. You may be able to adjust these automatic downloads through your device settings. These updates and upgrades are designed to improve and enhance our Services and can include bug fixes, enhancements and new modules. You consent to the installation of such software, including updates and upgrades (and authorise us to deliver such software to you) as part of your use of our Services. You may withdraw consent by ceasing to use the Services. </span></p>
<p ><span style='font-family:" sans-serif;'>You may not sell, rent, lease, assign, distribute, copy, modify or host any part of our Services. You may not reverse engineer or attempt to extract the source code of that software, except to the extent these restrictions are expressly prohibited by applicable law. </span></p>
<p ><span style='font-family:" sans-serif;'>  <h3>3.               Rights you give us </h3> </span></p>
<p ><span style='font-family:" sans-serif;'>Many of our Services let you create, upload, send, receive and store content. When you do that, you keep the ownership rights in that content you had to begin with. In order for us to perform our Services, you grant us a non-exclusive, royalty-free, irrevocable, worldwide licence, with the right to grant sub-licenses to reproduce, distribute, host, display your content for the purpose of operating, developing, providing, and improving the Services, including publishing, distributing and promoting your content with whom who have interacted with. You also grant us a sublicense to use your content as described in our Privacy Policy. <br> <br>  <strong>Please note: </h3>  <strong>This does not mean we can do anything we want with your content. This simply means for us to carry out our services, we require permission from you to access this content so we can share your comments to your community when you choose to do so.  </strong></span></p>
<p ><span style='font-family:" sans-serif;'>While we   re not required to do so, we may access, review, screen and delete your account at any time and for any reason if we think it may violate these Terms. You are responsible for the content that you create, send and store through the Services. </span></p>
<p ><span style='font-family:" sans-serif;'>We always love to hear from our users, but if you provide feedback or suggestions, we are able to use this without any means of compensating you and without any restriction or obligation to you. </span></p>
<p > <h3><span style='font-family:" sans-serif;'>4.               Privacy</span> </h3><span style='font-family:" sans-serif;'> </span></p>
<p><span style='font-family:" sans-serif;'>Your privacy matters to us. You can learn more about how we handle your information when you use our Services by reading our Privacy Policy. We encourage you to read it carefully because by using our Services you agree that MapBirdy can collect, use and share your information in the ways described in that policy. </span></p>
<p> <h3><span style='font-family:" sans-serif;'>5.               Respecting other people   s rights</span> </h3><span style='font-family:" sans-serif;'> </span></p>
<p ><span style='font-family:" sans-serif;'>MapBirdy respects the rights of others, and so should you. You may therefore not use the Services, or enable anyone else to use the Services in a manner that: </span></p>
<p ><span style='font-family:" sans-serif;'>    <li>      Violates or infringes someone else   s rights of copyright, trademark, patent, trade secret, moral right, privacy, publicity, or any other intellectual property or proprietary right </span></p>
<p ><span style='font-family:" sans-serif;'>   <li>      Is false, intentionally misleading, illegal or promotes an illegal activity or that impersonates any other person or entity, including MapBirdy</span></p>
<p ><span style='font-family:" sans-serif;'>   <li>      Is bullying, harassing, abusive, threatening, vulgar, obscene, offensive, or that contains pornography, nudity, or graphic or gratuitous violence, or that promotes violence, racism, discrimination, bigotry, hatred, harmful to minors under the age of 13 (or such other age determined by your jurisdiction) or physical harm of any kind against any group or individual </span></p>
<p ><span style='font-family:" sans-serif;'>   <li>      Spams or solicits MapBirdy users </span></p>
<p ><span style='font-family:" sans-serif;'>   <li>      Interferes with the positive experience of other users on the MapBirdy platform </span></p>
<p ><span style='font-family:" sans-serif;'>You also agree not to use the Services to: </span></p>
<p ><span style='font-family:" sans-serif;'>   <li>      Upload or distribute any form of viruses, worms, malicious code or any software intended to damage or alter data </span></p>
<p ><span style='font-family:" sans-serif;'>   <li>      collect information or data regarding other users, including email addresses or usernames, without their consent (e.g. using harvesting bots, robots, spiders, or scrapers) </span></p>
<p ><span style='font-family:" sans-serif;'>   <li>      disable, overly burden, impair, or otherwise interfere with servers or networks connected to the Services (e.g. a denial of service attack) </span></p>
<p ><span style='font-family:" sans-serif;'>   <li>      attempt to gain unauthorised access to the Services or servers or networks connected to the Services (e.g. through password mining) </span></p>
<p ><span style='font-family:" sans-serif;'>   <li>      interfere with another user   s use and enjoyment of the Services. </span></p>
<p > <h3><span style='font-family:" sans-serif;'>6.               Your account</span> </h3><span style='font-family:" sans-serif;'> </span></p>
<p ><span style='font-family:" sans-serif;'>You are responsible for any activity that occurs on your account, so please keep it secure. One way to do so is to make sure you have a strong password that you don   t use for any other account. You agree that the registration information that you provide upon sign up is true and that you will keep it up to date. </span></p>
<p ><span style='font-family:" sans-serif;'>By using the Services, you agree that: </span></p>
<p ><span style='font-family:" sans-serif;'>   <li>      You will not create more than one account for yourself </span></p>
<p ><span style='font-family:" sans-serif;'>   <li>      You will not create another account if we   ve disabled your account, unless you have our written permission to do so </span></p>
<p ><span style='font-family:" sans-serif;'>   <li>      You will not buy, sell, rent or lease access to your MapBirdy account or username unless you have our written permission </span></p>
<p ><span style='font-family:" sans-serif;'>   <li>      You will not share your password with anyone </span></p>
<p ><span style='font-family:" sans-serif;'>   <li>      You will not log in or attempt to access the Service through unauthorised third-party applications or clients </span></p>
<p > <h3><span style='font-family:" sans-serif;'>7.               Data charges</span> </h3><span style='font-family:" sans-serif;'> </span></p>
<p ><span style='font-family:" sans-serif;'>You are responsible for any mobile charges that you may incur for using our Services including data charges for use or the Services and/or updates or upgrades of new versions of the Services. If you   re unsure what those charges may be, you should ask your service provider before using the Services. </span></p>
<p ><span style='font-family:" sans-serif;'>  <h3>8.               Ownership </h3> </span></p>
<p ><span style='font-family:" sans-serif;'>We, or our affiliates and licensors as applicable, retain all ownership and intellectual property rights in and to the Services, all modifications, improvements, customisations, updates, enhancements, derivative works, translations and adaptations to the foregoing.</span></p>
<p > <h3><span style='font-family:" sans-serif;'>9.         Third Party services</span> </h3><span style='font-family:" sans-serif;'> </span></p>
<p ><span style='font-family:" sans-serif;'>If you use a service, feature or functionality that is operated by a third party and made available through our Services (including Services we offer jointly with the third party), each party   s terms will govern the respective party   s relationship with you. MapBirdy is not responsible or liable for a third party   s terms or actions taken under the third party   s terms. </span></p>
<p > <h3><span style='font-family:" sans-serif;'>10.      Modifying the services and termination</span> </h3><span style='font-family:" sans-serif;'> </span></p>
<p ><span style='font-family:" sans-serif;'>We are always improving our Services and creating new ones all the time. We may add or remove features, products or functionalities and we may also suspend or stop certain Services at any time without notice. You can terminate these Terms at any time and for any reason by requesting to delete your account. </span></p>
<p ><span style='font-family:" sans-serif;'>MapBirdy may also terminate these Terms with you at any time, for any reason and without advance notice. We may stop providing you with any Services or impose new or additional limits on your ability to use your Services. We may also deactivate your account due to prolonged inactivity and we may reclaim your username at any time for any reason.</span></p>
<p ><span style='font-family:" sans-serif;'>  <h3>11.      Additional terms for specific services </h3></span></p>
<p ><span style='font-family:" sans-serif;'>Due to our ever-growing Services, we sometimes need to describe additional terms for specific Services. Those additional terms and conditions, which will be available with the relevant Services, then become part of your agreement with us if you use those Services. If any part of those additional terms conflicts with these Terms, the additional terms will prevail. </span></p>
<p ><span style='font-family:" sans-serif;'>  <h3>12.      Indemnity </h3> </span></p>
<p ><span style='font-family:" sans-serif;'>You agree, to the extent permitted by law, to indemnify, defend, and hold harmless, MapBirdy, our affiliates, directors, officers, agents and suppliers from and against any and all claims, suits, losses, damages, liabilities, costs and expenses (including reasonable attorneys    fees) due to, arising out of, or relating in any way to: (a) your access to or use of the Services; (b) your content; and (c) your breach of these terms. We reserve the right, at your expense, to assume the exclusive defense and control of any matter that you are required to indemnify and you agree to cooperate with our defense of these claims. You agree not to settle any matter without our prior written consent. We will use reasonable efforts to notify you of any claim falling under this section once we learn of it. </span></p>
<p > <h3><span style='font-family:" sans-serif;'>13.      Disclaimers</span> </h3><span style='font-family:" sans-serif;'> </span></p>
<p ><span style='font-family:" sans-serif;'>THE SERVICES ARE PROVIDED  AS IS   AND  AS AVAILABLE   AND TO THE EXTENT PERMITTED BY LAW WITHOUT WARRANTIES OF ANY KIND, EITHER EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, TITLE, AND NON-INFRINGEMENT. IN ADDITION, WHILE MAPBIRDY ATTEMPTS TO PROVIDE A GREAT USER EXPERIENCE, WE DO NOT REPRESENT OR WARRANT THAT: (A) THE SERVICES WILL ALWAYS BE SECURE, ERROR-FREE, OR TIMELY; (B) THE SERVICES WILL ALWAYS FUNCTION WITHOUT DELAYS, DISRUPTIONS, OR IMPERFECTIONS; OR (C) THAT ANY CONTENT, USER CONTENT, OR INFORMATION YOU OBTAIN ON OR THROUGH THE SERVICES WILL BE TIMELY OR ACCURATE. </span></p>
<p ><span style='font-family:" sans-serif;'>MAPBIRDY TAKES NO RESPONSIBILITY AND ASSUMES NO LIABILITY FOR ANY CONTENT THAT YOU, ANOTHER USER, OR A THIRD PARTY CREATES, UPLOADS, SENDS, RECEIVES, OR STORES ON OR THROUGH OUR SERVICES. YOU UNDERSTAND AND AGREE THAT YOU MAY BE EXPOSED TO CONTENT THAT MIGHT BE OFFENSIVE, ILLEGAL, MISLEADING, OR OTHERWISE INAPPROPRIATE, NONE OF WHICH MAPBIRDY WILL BE RESPONSIBLE FOR. </span></p>
<p > <h3><span style='font-family:" sans-serif;'>14.      Limitation of liability</span> </h3><span style='font-family:" sans-serif;'> </span></p>
<p ><span style='font-family:" sans-serif;'>TO THE MAXIMUM EXTENT PERMITTED BY LAW, MAPBIRDY AND OUR MANAGING MEMBERS, EMPLOYEES, AFFILIATES, LICENSORS, AGENTS, AND SUPPLIERS WILL NOT BE LIABLE FOR ANY INDIRECT, INCIDENTAL, SPECIAL, CONSEQUENTIAL, PUNITIVE, OR MULTIPLE DAMAGES, OR ANY LOSS OF PROFITS OR REVENUES, WHETHER INCURRED DIRECTLY OR INDIRECTLY, OR ANY LOSS OF DATA, USE, GOODWILL, OR OTHER INTANGIBLE LOSSES, RESULTING FROM: (A) YOUR ACCESS TO OR USE OF OR INABILITY TO ACCESS OR USE THE SERVICES; (B) THE CONDUCT OR CONTENT OF OTHER USERS OR THIRD PARTIES ON OR THROUGH THE SERVICES; OR (C) UNAUTHORIZED ACCESS, USE, OR ALTERATION OF YOUR CONTENT, EVEN IF MAPBIRDY HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. IN NO EVENT WILL MAPBIRDY AGGREGATE LIABILITY FOR ALL CLAIMS RELATING TO THE SERVICES EXCEED THE GREATER OF $100 USD OR THE AMOUNT YOU PAID MAPBIRDY, IF ANY, IN THE LAST 12 MONTHS. </span></p>
<p > <h3><span style='font-family:" sans-serif;'>15.      Exclusive venue</span> </h3><span style='font-family:" sans-serif;'> </span></p>
<p ><span style='font-family:" sans-serif;'>Except as prohibited by applicable law, these Terms are governed by the laws of Sydney, Australia and the federal laws of Australia applicable therein, aside from its conflict of laws principles. Where the Terms allow claims to be resolved in Court, you agree to submit to the personal jurisdiction of the courts located exclusively within Sydney, Australia, for the purpose of litigating all claims or disputes related to injunctions sought by us or other equitable relief to protect our intellectual property rights in any court of competent jurisdiction. </span></p>
<p > <h3><span style='font-family:" sans-serif;'>16.      Resolution of disputes</span> </h3><span style='font-family:" sans-serif;'> </span></p>
<p  ><em><span style='font-size:21px;font-family:"Helvetica Neue";color:#333333;'>Mandatory Arbitration</span></em></p>
<p ><span style='font-family:" sans-serif;'>Any dispute or claim made by you relating to these Terms will be referred to and determined exclusively through binding confidential arbitration conducted in Sydney, Australia, unless the parties agree otherwise or otherwise provided herein.</span></p>
<p ><span style='font-family:" sans-serif;'>The arbitration will be held on an individual basis, before a single arbitrator and in accordance with Australian Law. You and MapBirdy agree that all information presented during Arbitration will remain confidential and not made public. </span></p>
<p ><span style='font-family:" sans-serif;'>BY ENTERING INTO THIS AGREEMENT, YOU ARE GIVING UP YOUR RIGHT TO GO TO COURT TO ASSERT ANY CLAIMS.</span></p>
<p ><span style='font-family:" sans-serif;'>You and MapBirdy also agree that: <br> (i) you and MapBirdy will each pay such portion of the costs of the arbitration, as determined by the arbitrator</span></p>
<p ><span style='font-family:" sans-serif;'>(ii) the arbitrator may consider whether costs are prohibitive compared to litigating in a court, and may require MapBirdy to pay a greater portion of the fees and expenses of the arbitrator, or the travel expenses of you or any witness</span></p>
<p ><span style='font-family:" sans-serif;'>(iii) the arbitrator will honour claims of privilege and privacy recognised at law</span></p>
<p ><span style='font-family:" sans-serif;'>(iv) the arbitrator may award any individual relief or individual remedies that are permitted by applicable law</span></p>
<p ><span style='font-family:" sans-serif;'>(v) the arbitrator&apos;s award will be final and non-appealable, but may be enforced in any court of competent jurisdiction.</span></p>
<p  ><em><span style='font-size:21px;font-family:"Helvetica Neue";color:#333333;'>Jury Trial Waiver</span></em></p>
<p ><span style='font-family:" sans-serif;'>YOU AND MAPBIRDY WAIVE THEIR CONSTITUTIONAL AND STATUTORY RIGHTS TO GO TO COURT AND HAVE A TRIAL IN FRONT OF A JUDGE OR A JURY. You and MapBirdy are instead electing that all claims and disputes shall be resolved by arbitration under this Arbitration Agreement. Arbitration procedures are typically more limited, more efficient and less costly than rules applicable in court and are subject to very limited review by a court. In the event any litigation should arise between you and MapBirdy in any state or federal court in a suit to vacate or enforce an arbitration award or otherwise, YOU AND MAPBIRDY WAIVE ALL RIGHTS TO A JURY TRIAL, instead electing that the dispute be resolved by a judge.</span></p>
<p  ><em><span style='font-size:21px;font-family:"Helvetica Neue";color:#333333;'>Class Action Waiver</span></em></p>
<p ><span style='font-family:" sans-serif;'>ALL CLAIMS AND DISPUTES WITHIN THE SCOPE OF THIS ARBITRATION AGREEMENT MUST BE ARBITRATED OR LITIGATED ON AN INDIVIDUAL BASIS AND NOT ON A CLASS BASIS. CLAIMS OF MORE THAN ONE CUSTOMER OR USER CANNOT BE ARBITRATED OR LITIGATED JOINTLY OR CONSOLIDATED WITH THOSE OF ANY OTHER CUSTOMER OR USER</span></p>
<p ><span style='font-family:" sans-serif;'>Some of our Services may have additional terms that contain dispute-resolution provisions unique to that Service or your residency. </span></p>
<p > <h3><span style='font-family:" sans-serif;'> 17.      Severability</span> </h3><span style='font-family:" sans-serif;'> </span></p>
<p ><span style='font-family:" sans-serif;'>If any provisions of these Terms are found unenforceable, then that provision will be severed from these Terms and not affect the validity and enforceability of any remaining provisions. </span></p>
<p > <h3><span style='font-family:" sans-serif;'>18.      Final Terms</span> </h3><span style='font-family:" sans-serif;'> </span></p>
<p ><span style='font-family:" sans-serif;'>   <li>      These Terms (together with any additional terms applicable to specific Services you use) make up the entire agreement between you and MapBirdy, and supersede any prior agreements. </span></p>
<p ><span style='font-family:" sans-serif;'>   <li>      These Terms do not create or confer any third-party beneficiary rights. </span></p>
<p ><span style='font-family:" sans-serif;'>   <li>      If we do not enforce a provision in these Terms, it will not be considered a waiver. </span></p>
<p ><span style='font-family:" sans-serif;'>   <li>      We reserve all rights not expressly granted to you. </span></p>
<p ><span style='font-family:" sans-serif;'>   <li>      You may not transfer any of your rights or obligations under these Terms without our consent. </span></p>
<p > <h3><span style='font-family:" sans-serif;'>Contact us</span> </h3><span style='font-family:" sans-serif;'> </span></p>
<p  ><span style='font-family:" sans-serif;'>MapBirdy welcomes your comments, complaints, claims, questions and suggestions. Please send us your feedback.</span></p>
<p  ><span style='font-family:" sans-serif;'> </span></p>
<p style='margin:0in;margin-bottom:.0001pt;font-size:16px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:" sans-serif;'>&copy; 2023 MapBirdy. All rights reserved.</span></p>
<p  > </p>

</div>

        </div>
        
    </div>
  </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>