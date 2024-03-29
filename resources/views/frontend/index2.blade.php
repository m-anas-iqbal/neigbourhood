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
$u_name = Auth::guard('users')->user()->name;
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
    <form  action="{{ route('search_area') }}" method="post" >
    @csrf
    <div class="input-group m-1 p-3 border_rl">
      <div class="input-group-prepend">
        <span class="input-group-text  ">
          <i style="font-size: 19px;" class="fas fa-map-marker-alt "></i>
        </span>
      </div>
      <!-- onchange="searcharea(this.value)" -->
      <input id="search-input" type="text" class="form-control  "
    <?php echo $retVal = (Session::has('area_name')) ? "value='".Session::get('area_name')."'" :"" ;  ?>
      name="search_area" placeholder="Search location...">
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
 <input type="radio" value="1" class="btn-check" name="options" id="option_{{ $questions->q_id }}_1" autocomplete="off" checked />
  <label class="btn btn-secondary yes-btn options" for="option1" ids="{{ $questions->q_id }}_1">{{ $questions->opt1 }}</label>
      <div class=" p_voutes"> <span>1</span> Votes <span>(1%)</span></div>
  @endif

</div>
<div class="col-3 text-center">
@if($questions->opt2 !="")
      <input type="radio" value="2" class="btn-check" name="options" id="option_{{ $questions->q_id }}_2" autocomplete="off"   />
  <label class="btn btn-secondary no-btn  options" for="option1" ids="{{ $questions->q_id }}_2">{{ $questions->opt2 }}</label>
      <div class=" p_voutes"> <span>1</span> Votes <span>(1%)</span></div>
  @endif
</div>
<div class="col-3 text-center">
@if($questions->opt3 !="")
  <input type="radio" value="3" class="btn-check" name="options" id="option_{{ $questions->q_id }}_3" autocomplete="off"   />
  <label class="btn btn-secondary no-btn options" for="option1" ids="{{ $questions->q_id }}_3">{{ $questions->opt3 }}</label>
      <div class=" p_voutes"> <span>1</span> Votes <span>(1%)</span></div>
  @endif
</div>
<div class="col-3 text-center">
@if($questions->opt4 !="")
 <input type="radio" value="4" class="btn-check" name="options" id="option_{{ $questions->q_id }}_4" autocomplete="off"   />
  <label class="btn btn-secondary no-btn options" for="option4" ids="{{ $questions->q_id }}_4">{{ $questions->opt4 }}</label>
      <div class=" p_voutes"> <span>1</span> Votes <span>(1%)</span></div>
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
        $comments = DB::table('comments as c')->join('users as u', 'c.u_id', 'u.id')->select('c.*','u.name as username')->orderby('c.created_at', 'DESC');
        // if(Session::has('area_name')){
        //     $comments->where('c.area_name', "{Session::get('area_name')}");
        //     // $comments =   $comments->where('c.area_name', 'LIKE', "%{Session::get('area_name')}%");
        // }
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
              <span class="date">{{ date("d F Y" , strtotime($comment->created_at)) }}</span>
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

$(document).ready(function() {
  let userLocation = null;

  // Retrieve the user's location and initialize autocomplete
  const successCallback = (position) => {
    const { latitude, longitude } = position.coords;
    userLocation = new google.maps.LatLng(latitude, longitude);
    initAutocomplete(userLocation);

    if (document.getElementById("search-input").value.trim() === "") {
      updateSearchInput(userLocation);
    //   alert(userLocation)
    }
  };

  const errorCallback = (error) => {
    console.log(error);
  };

  navigator.geolocation.getCurrentPosition(successCallback, errorCallback);

  // Retrieve the area name when the search input changes
  const searchInput = document.getElementById("search-input");
  searchInput.addEventListener("change", handleSearchInput);

  function handleSearchInput() {
    const location = searchInput.value;
    if (location.trim() !== "") {
      const geocoder = new google.maps.Geocoder();
      geocoder.geocode({ address: location }, (results, status) => {
        if (status === google.maps.GeocoderStatus.OK) {
          const place = results[0];

          const latLng = place.geometry.location;
          updateSearchInput(latLng);
        } else {
          console.log("Geocode was not successful for the following reason: " + status);
        }
      });
    } else {
      if (userLocation !== null) {
        updateSearchInput(userLocation);
      }
    }
  }

  function updateSearchInput(location) {
    const geocoder = new google.maps.Geocoder();
    geocoder.geocode({ location: location }, (results, status) => {
      if (status === google.maps.GeocoderStatus.OK) {
        if (results[0]) {
          const areaName = results[0].formatted_address;
          searchInput.value = areaName;
          if($(".area_name").val()==""){
            // alert("ASda")
              updated_session(areaName)
          }

        }
      } else {
        console.log("Geocoder failed due to: " + status);
      }
    });
  }
});

function updated_session(areaName) {
    $(".area_name").val(areaName)
    $.ajax({
                type:'post',
                url:"{{url('ajax_search_area')}}",
                data:{areaName:areaName, _token:"{{csrf_token()}}"},
                dataType:'text',
                success(data){
                    console.log(data);
                },
                error(data){
                    console.log(data);
                },
            });
}

// location working
function initAutocomplete(userLocation) {
  const map = new google.maps.Map(document.getElementById("map"), {
    center: userLocation,
    zoom: 18,
    mapTypeId: "roadmap",
  });

  const input = document.getElementById("search-input");
  const searchBox = new google.maps.places.SearchBox(input);
  map.addListener("bounds_changed", () => {
    searchBox.setBounds(map.getBounds());
  });

  let locationShape = null;

  const handlePlacesChanged = () => {
    const places = searchBox.getPlaces();
    if (places.length === 0) {
      return;
    }
    const geometry = places[0].geometry;
    if (geometry && geometry.location) {
      // Remove the previous location shape
      if (locationShape) {
        locationShape.setMap(null);
      }

      // Draw a new location shape
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
          map.setZoom(18);
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
}
window.initAutocomplete = initAutocomplete;

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
    $.ajax({
      type:'post',
      url:"{{url('getLocationVotes')}}",
      data:{ids:ids,area_name:area_name, _token:"{{csrf_token()}}"},
      dataType:'json',
      success:function(data){
          console.log('success');
          console.log(data);
      },
      error:function(data){
          console.log('error');
          console.log(data.responseText);
      }
    });
});
</script>

</body>
</html>
