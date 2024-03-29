<!doctype html>
<html lang="en">
  <head>
  <title> MapBirdy Privacy Policy</title>
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
<p class="texts text-center" ><span style='font-size:48px;font-family:"Helvetica Neue";color:#000000; '>Privacy Policy</span></p>
<p class="texts text-center"> <strong><span style='font-family:"Times New Roman",serif;'>Last Updated on June 15, 2023</span> </strong><span style='font-family:"Times New Roman",serif;'> </span></p>
<p ><span style='font-family:"Times New Roman",serif;'>MapBirdy is a community based social networking site used to identify behavioural traits of new or existing areas of interest. It engages the local community and is a word of mouth platform, to help identify trends and updates in local areas. </span></p>
<p ><span style='font-family:"Times New Roman",serif;'>While you are using our service, you&rsquo;ll share some information with us, so we want to be upfront about the information we collect, how we use it, who we share it with and how you can update and delete your information.</span></p>
<p ><span style='font-family:"Times New Roman",serif;'>By using our Service, you understand and agree that we are providing a platform for you to communicate, engage and view information. </span></p>
<p ><span style='font-family:"Times New Roman",serif;'>  <h3>1.        Information we collect </h3></span></p>
<p ><span style='font-family:"Times New Roman",serif;'>We collect the following types of information in order to provide the MapBirdy service. </span></p>
<p > <h4><span style='font-family:"Times New Roman",serif;'>Information you provide us directly:</span> </h4><span style='font-family:"Times New Roman",serif;'> </span></p>
<p ><span style='font-family:"Times New Roman",serif;'>We collect content, communications and other information when you use our service. Upon registration, we collect and store a username, email address and/or a social media login via Facebook or Google Sign in.</span></p>
<p ><span style='font-family:"Times New Roman",serif;'>You will also provide us with whatever information you send through our service, such as voting or commenting on an area. </span></p>
<p ><span style='font-family:"Times New Roman",serif;'>We will also collect any information when you contact customer support or communicate with us in any other way for general issues, reporting issues or any other information that you volunteer to share. </span></p>
<p > <h4> <span style='font-family:"Times New Roman",serif;'>Information we get when you use our services</span>  </h4><span style='font-family:"Times New Roman",serif;'> </span></p>
<p ><span style='font-family:"Times New Roman",serif;'>When you use our services, we collect information on the type of service you used and how you used it. </span></p>
<p > <h4><span style='font-family:"Times New Roman",serif;'>Usage Information: </span> </h3><span style='font-family:"Times New Roman",serif;'>We collect information about your activity through our services. For example, we may collect information about: </span></p>
<p ><span style='font-family:"Times New Roman",serif;'>o  How you interacted with our services, such as how you communicate with friends, their names, the time and date of your communication, the number of comments/votes you place or areas you search.</span></p>
<p > <h4><span style='font-family:"Times New Roman",serif;'>Location:</span> </h4><span style='font-family:"Times New Roman",serif;'> We require access to your location when you choose to use our location feature. Without this access, we would not be able to provide you with the maps feature. </span></p>
<p > <h3><span style='font-family:"Times New Roman",serif;'>2.         How we use information </span> </h3><span style='font-family:"Times New Roman",serif;'> </span></p>
<p ><span style='font-family:"Times New Roman",serif;'>We use the information we collect to help better our services and create a better user experience for our community. Some ways we do that is by: </span></p>
<p > <h4><span style='font-family:"Times New Roman",serif;'>Improving our current features</span> </h4><span style='font-family:"Times New Roman",serif;'> </span></p>
<p ><span style='font-family:"Times New Roman",serif;'>We use information we collect to enhance our current features. For example, we review our database and feedback forms from our community and tailor our future updates for a more unified experience.</span></p>
<p > <h4><span style='font-family:"Times New Roman",serif;'>Enhancing our safety and security practices</span> </h4></p>
<p ><span style='font-family:"Times New Roman",serif;'>We use information to help verify accounts and limit bots from our site.</span></p>
<p > <h4><span style='font-family:"Times New Roman",serif;'>Sending you communications</span> </h4><span style='font-family:"Times New Roman",serif;'> </span></p>
<p ><span style='font-family:"Times New Roman",serif;'>We use the information we have to respond to reporting issues, general enquiries or any other form of communication. </span></p>
<p > <h4><span style='font-family:"Times New Roman",serif;'>Enforcing our Terms of Service and other usage policies</span> </h4><span style='font-family:"Times New Roman",serif;'> </span></p>
<p ><span style='font-family:"Times New Roman",serif;'>We use the information we have to enforce our Terms of Service and other usage policies. For example, we may suspend or delete a user&rsquo;s account for violating our Terms of Service.</span></p>
<p > <h3><span style='font-family:"Times New Roman",serif;'>3.        How we share information</span> </h3><span style='font-family:"Times New Roman",serif;'> </span></p>
<p ><span style='font-family:"Times New Roman",serif;'>We share information about you in the following ways: </span></p>
<p > <h4><span style='font-family:"Times New Roman",serif;'>With our service providers</span> </h4><span style='font-family:"Times New Roman",serif;'> </span></p>
<p ><span style='font-family:"Times New Roman",serif;'>We use third party service providers to help operate our business. For example, we use a service supplier to store our data. We require all service providers to maintain a strict level of confidentiality. Use of your personal information by our service providers is further limited to the information they need to provide services on our behalf. </span></p>
<p > <h4><span style='font-family:"Times New Roman",serif;'>With Law Enforcement</span> </h4></p>
<p ><span style='font-family:"Times New Roman",serif;'>We may disclose your information to law enforcement for the following reasons: </span></p>
<p ><span style='font-family:"Times New Roman",serif;'>a)  If we believe it is needed to comply with any valid legal process, governmental request (including subpoenas, warrants or court orders), or applicable law, rules or regulation </span></p>
<p ><span style='font-family:"Times New Roman",serif;'>b)  As part of a legal investigation related to a suspected breach of our Terms of Service </span></p>
<p ><span style='font-family:"Times New Roman",serif;'>c)  To protect our, our user&rsquo;s or others&rsquo; rights, property and safety </span></p>
<p ><span style='font-family:"Times New Roman",serif;'>d)  To detect and resolve and fraud or security concerns </span></p>
<p > <h4><span style='font-family:"Times New Roman",serif;'>Merger or acquisition</span> </h4><span style='font-family:"Times New Roman",serif;'> </span></p>
<p ><span style='font-family:"Times New Roman",serif;'>We may share your information in connection with a merger, financing, acquisition, dissolution transaction, bankruptcy or proceeding involving sale, transfer, divestiture of all or some portion of our business to another company. If another company acquires our business or assets, that company will have your information collected by us and will assume the rights and obligations regarding your information as allowed by this policy. </span></p>
<p > <h3><span style='font-family:"Times New Roman",serif;'>4.       User Controls</span> </h3><span style='font-family:"Times New Roman",serif;'> </span></p>
<p > <h4><span style='font-family:"Times New Roman",serif;'>Updating Information</span> </h4><span style='font-family:"Times New Roman",serif;'> </span></p>
<p ><span style='font-family:"Times New Roman",serif;'>By tapping the My Account icon on the right hand side of the home screen, you can update your display name and password.</span></p>
<p > <h3><span style='font-family:"Times New Roman",serif;'>5.        European Users</span> </h3><span style='font-family:"Times New Roman",serif;'> </span></p>
<p ><span style='font-family:"Times New Roman",serif;'>If you are a user in the European Union, you should know that MapBirdy is the controller of your personal information. The legal bases for which we collect and use the information described above depends on what the information is and why we collected it. The four bases upon which we typically rely on include: </span></p>
<p > <h4><span style='font-family:"Times New Roman",serif;'>Contract</span> </h4><span style='font-family:"Times New Roman",serif;'> </span></p>
<p ><span style='font-family:"Times New Roman",serif;'>We might use your information to perform our contract with you. For example, when you want to send a message, we use information you have provided to carry out your request to send that message to the intended recipient. </span></p>
<p > <h4><span style='font-family:"Times New Roman",serif;'>Legitimate interest</span> </h4><span style='font-family:"Times New Roman",serif;'> </span></p>
<p ><span style='font-family:"Times New Roman",serif;'>Another reason we might use your information is because we have a legitimate interest in doing so. When we collect and process information based on our legitimate interests, we do so in a manner that is least obtrusive to your privacy. For example, we need to use your information to provide and improve our services, including safety and security, sending messages, providing customer support, troubleshoot technical problems and to develop new features. It is important to note that our interests don&rsquo;t outweigh your right to privacy, so we only rely on legitimate interest when we think about the way we are using your data. </span></p>
<p > <h4><span style='font-family:"Times New Roman",serif;'>Consent</span> </h4><span style='font-family:"Times New Roman",serif;'> </span></p>
<p ><span style='font-family:"Times New Roman",serif;'>If we have no legal basis for collecting or using your information, we will ask for your consent. If we do have a legal basis, you have the right to withdraw consent at any time. </span></p>
<p > <h4><span style='font-family:"Times New Roman",serif;'>Legal Obligation</span> </h4><span style='font-family:"Times New Roman",serif;'> </span></p>
<p ><span style='font-family:"Times New Roman",serif;'>We may be required to use your personal information to comply with the law. For example, we may need to respond to valid legal processes to take action to protect the rights of our users. </span></p>
<p > <h4><span style='font-family:"Times New Roman",serif;'>EU Users'Rights</span> </h4></p>
<p ><span style='font-family:"Times New Roman",serif;'>You have the right to object to our use of your information. To view personal information Mapbirdy collects about you, please navigate to the home screen and selected the My Account icon on the top right hand side. This will present a screen with all the details that are stored on our server. If you do not wish for your data to be processed any longer, you may request to delete your account by contacting us. Deleting your account will permanently delete all information about your account. </span></p>
<p > <h4><span style='font-family:"Times New Roman",serif;'>If you have any complaints, you are able to file one with the supervisory authority in your Member State.</span> </h4><span style='font-family:"Times New Roman",serif;'> </span></p>
<p > <h3><span style='font-family:"Times New Roman",serif;'>7. Revisions</span> </h3><span style='font-family:"Times New Roman",serif;'> </span></p>
<p style='margin:0in;margin-bottom:.0001pt;font-size:16px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>We may make changes to this Privacy Policy from time to time but when we do so, we will make sure to let you know. When a change is made, we may revise the date at the top of this policy, add a statement to our website stating a Privacy Policy revision or notify users via email. </span></p>
<p style='margin:0in;margin-bottom:.0001pt;font-size:16px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'> </span></p>
<p style='margin:0in;margin-bottom:.0001pt;font-size:16px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'> </span></p>
<p style='margin:0in;margin-bottom:.0001pt;font-size:16px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>&copy; 2023 MapBirdy. All rights reserved.</span></p>
<p style='margin:0in;margin-bottom:.0001pt;font-size:16px;font-family:"Calibri",sans-serif;'> </p>
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