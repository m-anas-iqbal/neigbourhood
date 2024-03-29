<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MapBirdy</title>

  <!-- Bootstrap CSS -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="shortcut icon" href="{{ asset('public/frontend/images/Favocon.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('public/frontend/css/custom.css') }}" >
  <style>
    .close_btn{
    position: absolute;
    right: 33px;
    font-size: 7px;
    margin-top: -6px;
    }
  </style>
</head>

<body>
<?php
$u_name = Auth::guard('users')->user()->name;
$u_id2 = Auth::guard('users')->user()->id;
?>
  <div id="map"></div>

<div class="dropdown">
  <button class="dropbtn"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg></button>
  <div class="dropdown-content">
    <h5 href="#" style="color:black;font-weight: 700;text-transform: capitalize;border-bottom:1px solid black;padding:4px">{{ $u_name }}</h5>
    <a href="{{ route('profile') }}">Profile</a>
    <a href="{{ route('contact') }}">Contact Us</a>
    <a href="{{ route('logout') }}">Sign Out</a>
  </div>
</div>
  <div id="card">
    <!-- <h3 class="logo">NEIGHBOURHOOD</h3> -->
    <!-- <p class="logo-p m-1">Build by the community, for the community</p> -->
    <a href="index.html" class="brand-logo">
						<img src="{{ asset('public/frontend/images/mainLOGO.png') }}" alt="logo">
					</a>
    <form  id="search-input-form" action="{{ route('search_area') }}" method="post" >
    @csrf
    <div class="input-group m-1 p-3 border_rl">
      <div class="input-group-prepend">
        <span class="input-group-text  ">
          <i style="font-size: 19px;" class="fas fa-map-marker-alt "></i>
        </span>
      </div>
      <!-- onchange="searcharea(this.value)" -->
      <input id="search-input" type="text" class="form-control search-input "
    <?php echo $retVal = (Session::has('area_name')) ? "value='".Session::get('area_name')."'" :"" ;  ?>
      name="search_area"  id="search-btn" placeholder="Search location...">
      <div class="input-group-append">
        <button style="font-size: 12px;margin-left:10px" type="submit" id="search-btn" class="btn btn-primary">Search</button>
      </div>

 
    </div>
    </form>

    
    @error('search_area')   <p class="text-danger"> {{ $message }} </p> @enderror @error('area_name') <p class="text-danger"> {{ $message }} </p>  @enderror
    <div class="input-group m-1 p-2">

      <input style="font-size: 12px;" type="text" id="questionSearch" onclick="closeAllAccordions()" class="form-control  " placeholder="Search question ...">

    </div>
    <div class="accordion " id="accordionPanelsStayOpenExample">
  <?php
              $question = DB::table('question')->where('status', 1 )->orderby('listing_order')->get();

        ?>
        @foreach ($question as  $key => $questions)
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
      <button class="accordion-button  @if($key !=0) collapsed @endif " type="button" data-bs-toggle="collapse" data-bs-target="#question_no_{{ $questions->q_id }}"  @if($key ==0) aria-expanded="true" @else aria-expanded="false" @endif  aria-controls="question_no_{{ $questions->q_id }}">
     {{ $questions->question }}
      </button>
    </h2>
    <div id="question_no_{{ $questions->q_id }}" class="accordion-collapse collapse @if($key ==0) show @endif" aria-labelledby="panelsStayOpen-headingOne">
      <div class="accordion-body1">
      <div  class="row">

<div class="col-3 text-center">


@if($questions->opt1 !="")
 <input type="radio" value="1" class="btn-check" name="options" id="option_{{ $questions->q_id }}_1" autocomplete="off"  />
 
  <?php
   $u_id = Auth::guard('users')->user()->id;
   $area_name = Session::get('area_name');
   $chkVote1 = DB::table('answer')->where(['u_id'=>$u_id,'q_id'=>$questions->q_id, 'area_name'=>$area_name, 'opt'=>1])->get();
   if($chkVote1->count() > 0){$btn_val1 = 'yes-btn';}else{$btn_val1 = 'no-btn';}

   $totalQuesVotes1 = DB::table('answer')->where(['q_id'=>$questions->q_id,'area_name'=>$area_name])->count();
   $totalVotes1 = DB::table('answer')->where(['q_id'=>$questions->q_id, 'opt'=>'1','area_name'=>$area_name])->count();

   $per1 = 0;
   if($totalQuesVotes1 > 0 && $totalVotes1 > 0){
       $per1 = ($totalVotes1/$totalQuesVotes1)*100;
   }
  ?>
  <label class="btn btn-secondary {{$btn_val1}} options qoptions_{{ $questions->q_id }}" for="option1" id="{{ $questions->q_id }}_1" ids="{{ $questions->q_id }}_1">{{ $questions->opt1 }}</label>
      <div class=" p_voutes"> <span id="t_votes_{{ $questions->q_id }}_1">{{$totalVotes1}}</span> Votes (<span id="t_per_{{ $questions->q_id }}_1">{{$per1}}</span><span>%</span>)</div>
  @endif

</div>
<div class="col-3 text-center">
@if($questions->opt2 !="")
      <input type="radio" value="2" class="btn-check" name="options" id="option_{{ $questions->q_id }}_2" autocomplete="off"   />
      <?php
      $u_id = Auth::guard('users')->user()->id;
      $area_name = Session::get('area_name');
      $chkVote2 = DB::table('answer')->where(['u_id'=>$u_id,'q_id'=>$questions->q_id, 'area_name'=>$area_name, 'opt'=>2])->get();
      if($chkVote2->count() > 0){$btn_val2 = 'yes-btn';}else{$btn_val2 = 'no-btn';}

      $totalQuesVotes2 = DB::table('answer')->where(['q_id'=>$questions->q_id,'area_name'=>$area_name])->count();
      $totalVotes2 = DB::table('answer')->where(['q_id'=>$questions->q_id, 'opt'=>'2','area_name'=>$area_name])->count();

      $per2 = 0;
      if($totalQuesVotes2 > 0 && $totalVotes2 > 0){
          $per2 = ($totalVotes2/$totalQuesVotes2)*100;
      }
      ?>
      <label class="btn btn-secondary {{$btn_val2}}  options options qoptions_{{ $questions->q_id }}" for="option1" id="{{ $questions->q_id }}_2" ids="{{ $questions->q_id }}_2">{{ $questions->opt2 }}</label>
      <div class=" p_voutes"> <span id="t_votes_{{ $questions->q_id }}_2">{{$totalVotes2}}</span> Votes (<span id="t_per_{{ $questions->q_id }}_2">{{$per2}}</span><span>%</span>)</div>
  @endif
</div>
<div class="col-3 text-center">
@if($questions->opt3 !="")
  <input type="radio" value="3" class="btn-check" name="options" id="option_{{ $questions->q_id }}_3" autocomplete="off"   />
  <?php
      $u_id = Auth::guard('users')->user()->id;
      $area_name = Session::get('area_name');
      $chkVote3 = DB::table('answer')->where(['u_id'=>$u_id,'q_id'=>$questions->q_id, 'area_name'=>$area_name, 'opt'=>3])->get();
      if($chkVote3->count() > 0){$btn_val3 = 'yes-btn';}else{$btn_val3 = 'no-btn';}

      $totalQuesVotes3 = DB::table('answer')->where(['q_id'=>$questions->q_id,'area_name'=>$area_name])->count();
      $totalVotes3 = DB::table('answer')->where(['q_id'=>$questions->q_id, 'opt'=>'3','area_name'=>$area_name])->count();

      $per3 = 0;
      if($totalQuesVotes3 > 0 && $totalVotes3 > 0){
          $per3 = ($totalVotes3/$totalQuesVotes3)*100;
      }
      ?>
  <label class="btn btn-secondary {{$btn_val3}} options options qoptions_{{ $questions->q_id }}" for="option1" id="{{ $questions->q_id }}_3" ids="{{ $questions->q_id }}_3">{{ $questions->opt3 }}</label>
      <div class=" p_voutes"> <span id="t_votes_{{ $questions->q_id }}_3">{{$totalVotes3}}</span> Votes (<span id="t_per_{{ $questions->q_id }}_3">{{$per3}}</span><span>%</span>)</div>
  @endif
</div>
<div class="col-3 text-center">
@if($questions->opt4 !="")
 <input type="radio" value="4" class="btn-check" name="options" id="option_{{ $questions->q_id }}_4" autocomplete="off"   />
 <?php
      $u_id = Auth::guard('users')->user()->id;
      $area_name = Session::get('area_name');
      $chkVote4 = DB::table('answer')->where(['u_id'=>$u_id,'q_id'=>$questions->q_id, 'area_name'=>$area_name, 'opt'=>4])->get();
      if($chkVote4->count() > 0){$btn_val4 = 'yes-btn';}else{$btn_val4 = 'no-btn';}

      $totalQuesVotes4 = DB::table('answer')->where(['q_id'=>$questions->q_id,'area_name'=>$area_name])->count();
      $totalVotes4 = DB::table('answer')->where(['q_id'=>$questions->q_id, 'opt'=>'4','area_name'=>$area_name])->count();

      $per4 = 0;
      if($totalQuesVotes4 > 0 && $totalVotes4 > 0){
          $per4 = ($totalVotes4/$totalQuesVotes4)*100;
      }
      ?>
 <label class="btn btn-secondary {{$btn_val4}} options options qoptions_{{ $questions->q_id }}" for="option4" id="{{ $questions->q_id }}_4" ids="{{ $questions->q_id }}_4">{{ $questions->opt4 }}</label>
      <div class=" p_voutes"> <span id="t_votes_{{ $questions->q_id }}_4">{{$totalVotes4}}</span> Votes (<span id="t_per_{{ $questions->q_id }}_4">{{$per4}}</span><span>%</span>)</div>
  @endif
</div>
    </div>
    <form action="{{ route('comment_post') }}" method="post">
      <div class="form-group input-group m-0 p-2">
        <input type="hidden" value="{{ $questions->q_id }}" name="q_id">
        <input type="hidden"  <?php echo $retVal = (Session::has('area_name')) ? "value='".Session::get('area_name')."'" :"" ;  ?> class="area_name" name="area_name">
        @csrf
        <input class="form-control"  name="comment" id="comment_input"  placeholder="Write comment..."/>
        <div class="input-group-append">
        <button style="font-size: 12px;margin-left:4px;"  id="comt_btn" class="btn btn-primary">Submit</button>
      </div>
      </div>
       <p class="text-danger"> @error('comment') {{ $message }} @enderror </p>
    </form>
    <div class="cont">


      <div  class="comment-wrapper container container_{{ $questions->q_id }} m-2">
      <?php
        // $comments = DB::table('comments as c')->join('users as u', 'c.u_id', 'u.id')->select('c.*','u.name as username')->orderby('c.created_at', 'DESC');
        // if(Session::has('area_name')){
        //     //$comments->where('c.area_name', "{Session::get('area_name')}");
        //     // $comments =   $comments->where('c.area_name', 'LIKE', "%{Session::get('area_name')}%");
        //     $comments = $comments->where('c.area_name', Session::get('area_name'));
        // }

        // $comments = $comments->where('c.q_id', $questions->q_id)->get();
        // // print_r($comments)

             $comments = DB::table('comments as c')
    ->join('users as u', 'c.u_id', 'u.id')
    ->select('c.*', 'u.name as username')
    ->orderBy('c.created_at', 'DESC');

if (Session::has('area_name')) {
    $areaName = Session::get('area_name');
    $comments->where('c.area_name', 'LIKE', "$areaName");
}

$comments = $comments->where('c.q_id', $questions->q_id)->get();



       ?>


        @foreach ($comments as  $key => $comment)
@if($comment)

      <div class="user-comment single-item id_{{ $questions->q_id }}" data-id='{{ $questions->q_id }}'>
       
          <div class="col-12 d-flex justify-content-between align-items-center">
            <div class="username-container">
              <span class="user-name">{{ $comment->username  }}</span>
            </div>
            <div>
            <i class="fa fa-x"></i>
              <span class="date">{{ date("d F Y" , strtotime($comment->created_at)) }}
              @if($comment->u_id == $u_id2)
        <div class="close_btn ">
        <button type="button" class="btn-close" onclick="delcomments({{$comment->c_id}})" ></button>
        </div>
        @endif
              </span>
            </div>
          </div>
          <div>
            <span class="">{{  $comment->comment  }}</span>
          </div>
        </div>
        @endif()
        @endforeach()
      </div>
      </div>
      </div>
    </div>
  </div>
 
  @endforeach()

  </div>

  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRDEPG-Y1Ft3BmeLYzLZTnxgTvyDHxJVw&callback=initAutocomplete&libraries=places&v=weekly"
      defer
    ></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <!-- Bootstrap JS -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

 
 <script>
    // input = $("#questionSearch")
    // input.addEventListener('focus', closeAllAccordions);


    $(document).ready(function() {

        let isDropdownSelection = false;

        // Handle input value changes
        $('#search-input').on('input', function() {
          if (!isDropdownSelection) {
            // Value changed without dropdown selection
            console.log('Value changed:', $(this).val());
          }
          // Reset the flag
          isDropdownSelection = false;
        });

        // Handle dropdown selection
        $('#search-input').on('change', function() {
          isDropdownSelection = true;
          console.log('Dropdown selected:', $(this).val());
          //$('#search-input-form').submit();
        });
        
      });




(function($) {
	var pagify = {
		items: {},
		container: null,
		totalPages: 1,
		perPage: 3,
		currentPage: 0,
		createNavigation: function() {
     
			this.totalPages = Math.ceil(this.items.length / this.perPage);

			$('.pagination', this.container.parent()).remove();
			var pagination = $('<div class="pagination"></div>').append('<a class="nav prev disabled" data-next="false"><</a>');

			for (var i = 0; i < this.totalPages; i++) {
				var pageElClass = "page";
				if (!i)
					pageElClass = "page current";
				var pageEl = '<a class="' + pageElClass + '" data-page="' + (
				i + 1) + '">' + (
				i + 1) + "</a>";
				pagination.append(pageEl);
			}
			pagination.append('<a class="nav next" data-next="true">></a>');

			this.container.after(pagination);

			var that = this;
			$("body").off("click", ".nav");
			this.navigator = $("body").on("click", ".nav", function() {
				var el = $(this);
				that.navigate(el.data("next"));
			});

			$("body").off("click", ".page");
			this.pageNavigator = $("body").on("click", ".page", function() {
				var el = $(this);
				that.goToPage(el.data("page"));
			});
		},
		navigate: function(next) {
      
			// default perPage to 5
			if (isNaN(next) || next === undefined) {
				next = true;
			}
			$(".pagination .nav").removeClass("disabled");
			if (next) {
				this.currentPage++;
				if (this.currentPage > (this.totalPages - 1))
					this.currentPage = (this.totalPages - 1);
				if (this.currentPage == (this.totalPages - 1))
					$(".pagination .nav.next").addClass("disabled");
				}
			else {
				this.currentPage--;
				if (this.currentPage < 0)
					this.currentPage = 0;
				if (this.currentPage == 0)
					$(".pagination .nav.prev").addClass("disabled");
				}

			this.showItems();
		},
		updateNavigation: function() {
      
			var pages = $(".pagination .page");
			pages.removeClass("current");
			$('.pagination .page[data-page="' + (
			this.currentPage + 1) + '"]').addClass("current");
		},
		goToPage: function(page) {
      
			this.currentPage = page - 1;

			$(".pagination .nav").removeClass("disabled");
			if (this.currentPage == (this.totalPages - 1))
				$(".pagination .nav.next").addClass("disabled");

			if (this.currentPage == 0)
				$(".pagination .nav.prev").addClass("disabled");
			this.showItems();
		},
		showItems: function() {
      
			this.items.hide();
			var base = this.perPage * this.currentPage;
			this.items.slice(base, base + this.perPage).show();

			this.updateNavigation();
		},
		init: function(container, items, perPage) {
      
			this.container = container;
			this.currentPage = 0;
			this.totalPages = 1;
			this.perPage = perPage;
			this.items = items;
			this.createNavigation();
			this.showItems();
		}
	};

	// stuff it all into a jQuery method!
	$.fn.pagify = function(perPage, itemSelector) {
    
		var el = $(this);
		var items = $(itemSelector, el);

		// default perPage to 5
		if (isNaN(perPage) || perPage === undefined) {
			perPage = 3;
		}
		// don't fire if fewer items than perPage
		if (items.length <= perPage) {
			return true;
		}
		pagify.init(el, items, perPage);
	};
})(jQuery);

$('.single-item').each(function(i, obj) {
  
    var id2 = 0;
    var id = $(this).attr('data-id');
    if(id!=id2 || id2==0){
        id2 = id
    }
    $(".container_"+id2).pagify(6, ".id_"+id2);
});

    @if (Session::get('msg'))
$(document).ready(function(){

    var txt ="<?php echo Session::get('msg');?> ";
    var alert ="<?php echo Session::get('alert');?>";
    swal("",txt, alert)
}); @endif


// location code
$(document).ready(function() {
  
  let userLocation = null;
  let locationShape = null;

  const successCallback = (position) => {
    const { latitude, longitude } = position.coords;
    userLocation = new google.maps.LatLng(latitude, longitude);
    initAutocomplete(userLocation);

    if (document.getElementById("search-input").value.trim() === "") {
      updateSearchInput(userLocation);
    }
  };

  const errorCallback = (error) => {
    console.log(error);
  };

  navigator.geolocation.getCurrentPosition(successCallback, errorCallback);

  // const searchInput = document.getElementById("search-input");
  // searchInput.addEventListener("change", handleSearchInput);

  // function handleSearchInput() {
  //   const location = searchInput.value;
  //   if (location.trim() !== "") {
  //     const geocoder = new google.maps.Geocoder();
  //     geocoder.geocode({ address: location }, (results, status) => {
  //       if (status === google.maps.GeocoderStatus.OK) {
  //         const place = results[0];
  //         const latLng = place.geometry.location;
  //         updateSearchInput(latLng);
  //       } else {
  //         console.log("Geocode was not successful for the following reason: " + status);
  //       }
  //     });
  //   } else {
  //     if (userLocation !== null) {
  //       updateSearchInput(userLocation);
  //     }
  //   }
  // }



  function updateSearchInput(location) {

    const geocoder = new google.maps.Geocoder();
    geocoder.geocode({ location: location }, (results, status) => {
      if (status === google.maps.GeocoderStatus.OK) {
        if (results[0]) {
          const areaName = results[0].formatted_address;
          searchInput.value = areaName;
          if ($(".area_name").val() === "") {
            updated_session(areaName);
          }
        }
      } else {
        console.log("Geocoder failed due to: " + status);
      }
    });
  }

  function updated_session(areaName) {
 
    $(".area_name").val(areaName);
    $.ajax({
      type: 'post',
      url: "{{url('ajax_search_area')}}",
      data: { areaName: areaName, _token: "{{csrf_token()}}" },
      dataType: 'text',
      success(data) {
        console.log(data);
      },
      error(data) {
        console.log(data);
      },
    });
  }

  function initAutocomplete(userLocation) {
   
    const map = new google.maps.Map(document.getElementById("map"), {
      center: userLocation,
      zoom: 18,
      mapTypeId: "roadmap",
    });


// Create a new instance of AutocompleteService
var autocompleteService = new google.maps.places.AutocompleteService();

// Get the input field element
var searchInput = document.getElementById('search-input');

// Set options for autocomplete behavior
var autocompleteOptions = {
  types: ['geocode'], // Restrict results to geographical locations
  componentRestrictions: { country: 'au' } // Restrict results to Australia
};

// Attach the autocomplete functionality to the input field
// var autocomplete = new google.maps.places.Autocomplete(searchInput, autocompleteOptions);



    const input = document.getElementById("search-input");
    const searchBox = new google.maps.places.SearchBox(input);
     map.addListener("bounds_changed", () => {
       searchBox.setBounds(map.getBounds());
       //console.log(event);
              //alert('ss');


              document.getElementById("search-input").addEventListener("keyup", function(event) {
              var eventNumber = event.keyCode || event.which;
              console.log("Event number: " + eventNumber);
              if( eventNumber == 13){
                $('#search-input-form').submit();
              }
            });

            //   document.getElementById("search-input").addEventListener("change", function(event2) {
            //   var changedValue = event2.target.value;
            //   console.log("Changed value on mouse: " + changedValue);
            // });

            var eventCounter = 0;

// document.getElementById("search-input").addEventListener("change", function(event) {
//   eventCounter++;
//   var changedValue = event.target.value;
//   //console.log("Event Number: " + eventCounter);
//   //console.log("Changed value on change: " + changedValue);
//   if( changedValue != ''){
//     $('#search-input-form').submit();
//   }
// });




              const input = document.getElementById("search-input");

              //Get the value of the search box
              const searchValue = input.value;
              //alert(searchValue);
              //first get current event here

              //check event if it is not load or change 

              //enter in condition and submit form 
            //   window.location.reload();
              //$('#search-input').submit();
     });

    let locationShape = null;

    const handlePlacesChanged = () => {
      const places = searchBox.getPlaces();
      if (places.length === 0) {
        return;
      }
      const geometry = places[0].geometry;
      if (geometry && geometry.location) {
        if (locationShape) {
          locationShape.setMap(null);
        }

        if (geometry.viewport) {
          locationShape = new google.maps.Rectangle({
            map: map,
            bounds: geometry.viewport,
            fillOpacity: 0,
            strokeColor: "#FF0000",
            strokeOpacity: 1,
            strokeWeight: 2,
          });
        } else {
          locationShape = new google.maps.Circle({
            map: map,
            center: geometry.location,
            radius: 100, // Adjust the radius as desired
            fillOpacity: 0,
            strokeColor: "#FF0000",
            strokeOpacity: 1,
            strokeWeight: 2,
          });
        }

        map.fitBounds(geometry.viewport);
      }
    };

    searchBox.addListener("places_changed", handlePlacesChanged);
    input.addEventListener("keydown", (event) => {
      //console.log('event.key=> '+ event.key);
      if (event.key === "Enter") {
        event.preventDefault();
        handlePlacesChanged();
      }
    });

    const getMarkerForLocation = () => {
  const location = input.value;
  if (location.trim() !== "") {
    const geocoder = new google.maps.Geocoder();
    geocoder.geocode({ address: location }, (results, status) => {
      if (status === google.maps.GeocoderStatus.OK) {
        const place = results[0];
        const latLng = place.geometry.location;
        map.setCenter(latLng);

        if (place.geometry.viewport) {
          map.fitBounds(place.geometry.viewport);
        } else {
          // Fallback to a default zoom level
          map.setZoom(14);
        }

        handlePlacesChanged();
      } else {
        console.log("Geocode was not successful for the following reason: " + status);
      }
    });
  }
};

    if (input.value.trim() !== "") {
      getMarkerForLocation();
    } else {
      getMarkerForLocation(); // Retrieve user location
    }

    // Add location border if input has a value during load time
    if (input.value.trim() !== "") {
      const geocoder = new google.maps.Geocoder();
      geocoder.geocode({ address: input.value }, (results, status) => {
        if (status === google.maps.GeocoderStatus.OK) {
          const place = results[0];
          const geometry = place.geometry;
          if (geometry) {
            if (geometry.viewport) {
              locationShape = new google.maps.Rectangle({
                map: map,
                bounds: geometry.viewport,
                fillOpacity: 0,
                strokeColor: "#FF0000",
                strokeOpacity: 1,
                strokeWeight: 2,
              });
            } else {
              locationShape = new google.maps.Circle({
                map: map,
                center: geometry.location,
                radius: 100, // Adjust the radius as desired
                fillOpacity: 0,
                strokeColor: "#FF0000",
                strokeOpacity: 1,
                strokeWeight: 2,
              });
            }
          }
        } else {
          console.log("Geocode was not successful for the following reason: " + status);
        }
      });
    }
  }

  window.initAutocomplete = initAutocomplete;

  
});

// end location code

    $(document).ready(function(){
  
  $("#questionSearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".accordion-button").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

function closeAllAccordions() {
  
  const accordions = document.querySelectorAll('.accordion');
  accordions.forEach((accordion) => {
    const collapse = accordion.querySelector('.collapse');
    const isCollapsed = collapse.classList.contains('show');
    if (isCollapsed) {
      accordion.querySelector('.accordion-button').click();
    }
  });
}

$(document).on('click', '.options', function(){
    var ids = $(this).attr('ids');
    var area_name = $('.area_name').val();
    //alert(ids);

    if($(this).hasClass('no-btn')){
        //console.log('un checked');
      $.ajax({
        type:'post',
        url:"{{url('getLocationVotes')}}",
        data:{ids:ids,area_name:area_name, _token:"{{csrf_token()}}"},
        dataType:'json',
        success:function(data){
            console.log('success');
            console.log(data);
            var q_id = data.q_id;
            var vote_no = data.vote_no;
            var u_id = data.u_id;
            var t_votes = data.t_votes;

            $('#'+q_id+'_1').removeClass('yes-btn');
            $('#'+q_id+'_2').removeClass('yes-btn');
            $('#'+q_id+'_3').removeClass('yes-btn');
            $('#'+q_id+'_4').removeClass('yes-btn');

            $('#'+q_id+'_1').removeClass('no-btn');
            $('#'+q_id+'_2').removeClass('no-btn');
            $('#'+q_id+'_3').removeClass('no-btn');
            $('#'+q_id+'_4').removeClass('no-btn');

            var new_id = '#'+q_id+'_'+vote_no;
            $(new_id).addClass('yes-btn');
            //alert(q_id);
            switch(vote_no) {
              case '1':
                // code block
                {
                  //alert(1);
                  //$('#'+q_id+'_1').addClass('no-btn');
                  var q2 = '#'+q_id+'_2';
                  //console.log(q2);
                  $(q2).addClass('no-btn');

                  var q3 = '#'+q_id+'_3';
                  $(q3).addClass('no-btn');

                  var q4 = '#'+q_id+'_4';
                  $(q4).addClass('no-btn');

                  //$('#'+q_id+'_3').addClass('no-btn');
                  //$('#'+q_id+'_4').addClass('no-btn');
                }
                break;
              case '2':
                // code block
                {
                  //alert(2);
                  //$('#'+q_id+'_1').addClass('no-btn');
                  //$('#'+q_id+'_2').addClass('no-btn');
                  //$('#'+q_id+'_3').addClass('no-btn');
                  //$('#'+q_id+'_4').addClass('no-btn');

                  var q1 = '#'+q_id+'_1';
                  $(q1).addClass('no-btn');

                  //var q2 = '#'+q_id+'_2';
                  //$(q2).addClass('no-btn');

                  var q3 = '#'+q_id+'_3';
                  $(q3).addClass('no-btn');

                  var q4 = '#'+q_id+'_4';
                  $(q4).addClass('no-btn');
                }
                break;
              case '3':
                // code block
                {
                  //alert(3);
                  //$('#'+q_id+'_1').addClass('no-btn');
                  //$('#'+q_id+'_2').addClass('no-btn');
                  //$('#'+q_id+'_3').addClass('no-btn');
                  //$('#'+q_id+'_4').addClass('no-btn');

                  var q1 = '#'+q_id+'_1';
                  $(q1).addClass('no-btn');

                  var q2 = '#'+q_id+'_2';
                  $(q2).addClass('no-btn');

                  //var q3 = '#'+q_id+'_3';
                  //$(q3).addClass('no-btn');

                  var q4 = '#'+q_id+'_4';
                  $(q4).addClass('no-btn');
                }
                break;
              case '4':
                // code block
                {
                  //alert(4);
                  //$('#'+q_id+'_1').addClass('no-btn');
                  //$('#'+q_id+'_2').addClass('no-btn');
                  //$('#'+q_id+'_3').addClass('no-btn');
                  //$('#'+q_id+'_4').addClass('no-btn');

                  var q1 = '#'+q_id+'_1';
                  $(q1).addClass('no-btn');

                  var q2 = '#'+q_id+'_2';
                  $(q2).addClass('no-btn');

                  var q3 = '#'+q_id+'_3';
                  $(q3).addClass('no-btn');

                  //var q4 = '#'+q_id+'_4';
                  //$(q4).addClass('no-btn');
                }
                break;

            }
            //
            var vote_id = '#t_votes_'+q_id+'_'+vote_no;
            //console.log(t_votes);
            $(vote_id).html(t_votes);
            updateQuestionVotes(ids);
        },
        error:function(data){
            console.log('error');
            console.log(data.responseText);
        }

      });
    }

    //For unchecked selection of vot
    if($(this).hasClass('yes-btn')){
      //console.log('Click on Checked, and we try to unchecked it by deleting the vote from answer table');
      //console.log(ids+ '= '+area_name );
      var c = confirm('Sure! You want to uncheck this vote?');
      if(c == true){

      
      $.ajax({
        type:'post',
        url:"{{url('uncheckVote')}}",
        data:{ids:ids,area_name:area_name, _token:"{{csrf_token()}}"},
        dataType:'json',
        success:function(data){
          console.log('success of uncheck vot');
          console.log(data);
          var q_id = data.q_id;
            var vote_no = data.vote_no;
            var u_id = data.u_id;
            var t_votes = data.t_votes;

            $('#'+q_id+'_1').removeClass('yes-btn');
            $('#'+q_id+'_2').removeClass('yes-btn');
            $('#'+q_id+'_3').removeClass('yes-btn');
            $('#'+q_id+'_4').removeClass('yes-btn');

            $('#'+q_id+'_1').removeClass('no-btn');
            $('#'+q_id+'_2').removeClass('no-btn');
            $('#'+q_id+'_3').removeClass('no-btn');
            $('#'+q_id+'_4').removeClass('no-btn');

            var new_id = '#'+q_id+'_'+vote_no;
            $(new_id).addClass('yes-btn');
            //alert(q_id);
            switch(vote_no) {
              case '1':
                // code block
                {
                  //alert(1);
                  $('#'+q_id+'_1').addClass('no-btn');
                  
                  var q2 = '#'+q_id+'_2';
                  //console.log(q2);
                  $(q2).addClass('no-btn');

                  var q3 = '#'+q_id+'_3';
                  $(q3).addClass('no-btn');

                  var q4 = '#'+q_id+'_4';
                  $(q4).addClass('no-btn');

                  //$('#'+q_id+'_3').addClass('no-btn');
                  //$('#'+q_id+'_4').addClass('no-btn');
                }
                break;
              case '2':
                // code block
                {
                  //alert(2);
                  //$('#'+q_id+'_1').addClass('no-btn');
                  //$('#'+q_id+'_2').addClass('no-btn');
                  //$('#'+q_id+'_3').addClass('no-btn');
                  //$('#'+q_id+'_4').addClass('no-btn');

                  var q1 = '#'+q_id+'_1';
                  $(q1).addClass('no-btn');

                  var q2 = '#'+q_id+'_2';
                  $(q2).addClass('no-btn');

                  var q3 = '#'+q_id+'_3';
                  $(q3).addClass('no-btn');

                  var q4 = '#'+q_id+'_4';
                  $(q4).addClass('no-btn');
                }
                break;
              case '3':
                // code block
                {
                  //alert(3);
                  //$('#'+q_id+'_1').addClass('no-btn');
                  //$('#'+q_id+'_2').addClass('no-btn');
                  //$('#'+q_id+'_3').addClass('no-btn');
                  //$('#'+q_id+'_4').addClass('no-btn');

                  var q1 = '#'+q_id+'_1';
                  $(q1).addClass('no-btn');

                  var q2 = '#'+q_id+'_2';
                  $(q2).addClass('no-btn');

                  var q3 = '#'+q_id+'_3';
                  $(q3).addClass('no-btn');

                  var q4 = '#'+q_id+'_4';
                  $(q4).addClass('no-btn');
                }
                break;
              case '4':
                // code block
                {
                  //alert(4);
                  //$('#'+q_id+'_1').addClass('no-btn');
                  //$('#'+q_id+'_2').addClass('no-btn');
                  //$('#'+q_id+'_3').addClass('no-btn');
                  //$('#'+q_id+'_4').addClass('no-btn');

                  var q1 = '#'+q_id+'_1';
                  $(q1).addClass('no-btn');

                  var q2 = '#'+q_id+'_2';
                  $(q2).addClass('no-btn');

                  var q3 = '#'+q_id+'_3';
                  $(q3).addClass('no-btn');

                  var q4 = '#'+q_id+'_4';
                  $(q4).addClass('no-btn');
                }
                break;

            }
            //
            var vote_id = '#t_votes_'+q_id+'_'+vote_no;
            //console.log(t_votes);
            $(vote_id).html(t_votes);
            updateQuestionVotes(ids);
        },
        error:function(data){
          console.log('error of uncheck vot');
          console.log(data.responseText);
        }
        });
      }
  }
});

function updateQuestionVotes(ids){
  //update question vote count and percentage
  //var ids = $(this).attr('ids');

        var area_name = $('.area_name').val();
        var quesids_arr = ids.split("_");
        var ques_id = quesids_arr[0];
        var ques_voteno = quesids_arr[1];

    var qoptionsclass = '.qoptions_'+ques_id;
    $(qoptionsclass).each(function() {
          var qids = $(this).attr('ids');
          var qids_arr = qids.split("_");
          var question_id = qids_arr[0];
          var voteno = qids_arr[1];
          console.log(qids_arr);
          $.ajax({
              type:'post',
              url:"{{url('getVoteCountPercentage')}}",
              data:{area_name:area_name, question_id:question_id,voteno:voteno, _token:"{{csrf_token()}}"},
              dataType:'json',
              success:function(data){
                  console.log('success');
                  console.log(data);
                  var q_id = data.q_id;
                  var vote_no = data.vote_no;
                  var u_id = data.u_id;
                  var t_votes = data.t_votes;
                  var per = data.per;

                  var vote_id = '#t_votes_'+q_id+'_'+vote_no;
                  var vote_per = '#t_per_'+q_id+'_'+vote_no;
                  //console.log(t_votes);
                  $(vote_id).html(t_votes);
                  $(vote_per).html(per);
              },
              error:function(data){
                  console.log('error');
                  console.log(data.responseText);
              }
          });
    });
}

//update all vote count and percentage

function delcomments(id) {
    swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this Question!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    let _token = "{{ csrf_token() }}";
                $.ajax({
                    type: 'POST',
                    url: "{{ url('/delcomment') }}",
                    data: {
                        _token: _token,
                        id: id,
                    },
                    dataType:'json',
                    success: function(data) {
    location.reload();
                    },
                    error:function(data){
                        console.log('error');
                        console.log(data.responseText);
                    }
                });
  }
});
}

// Assuming you have already initialized the SearchBox and map

// Get a reference to the search box element
const input = document.getElementById("search-input");
//alert(input)
// Listen for the 'place_changed' event on the search box
searchBox.addListener("place_changed", () => {
  // Get the selected place from the search box
  const place = searchBox.getPlace();
  //alert(place);
  // Check if a place was selected
  if (place && place.geometry) {
    // Retrieve the location and other details of the selected place
    const location = place.geometry.location;
    const address = place.formatted_address;
    const latitude = location.lat();
    const longitude = location.lng();

    // Do something with the selected location and details
    console.log("Selected location:", location);
    console.log("Selected address:", address);
    console.log("Latitude:", latitude);
    console.log("Longitude:", longitude);

    // Update the map or perform any other actions you need
    // map.setCenter(location);
    // map.setZoom(18);

    // Call your custom function or handle the selected location as needed
    handleSelectedLocation(place);
  }
});


</script>
 


</body>
</html>