@extends('admin.layout.master')
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

@endsection
@section('content')

<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
 <!-- partial start -->
 <?php 
        //Calculate different counts of dashboard.

        // 1-Total Signed Up Users
            $total_users = DB::table('users')->where('status', 1)->count();
            $total_users_disabled = DB::table('users')->where('status', 0)->count();
        // 2-Total Votes
            $total_votes = DB::table('answer')->count();
        // 3-Total Comments
            $total_comments = DB::table('comments')->count();
        // 4-Most votes by locations
          /*First i will get repeated locations*/
          $area_name_total = DB::table('answer')
                 ->select('area_name', DB::raw('count(*) as area_name_total'))
                 ->groupBy('area_name')
                 ->get();

          //echo '<pre>';
          //print_r($area_name_total);
          $area_name_arr = [];
          $area_name_total_arr = [];
          foreach($area_name_total as $area_name){
            //$area_name_arr = $area_name->area_name;
            //$area_name_total_arr = $area_name->area_name_total;
            array_push($area_name_arr,$area_name->area_name);
            array_push($area_name_total_arr,$area_name->area_name_total);
          }
    
        // 5-Most comments by location
            /*First i will get repeated locations*/
                    // $area_name_total2 = DB::table('comments')
                    // ->select('area_name', DB::raw('count(*) as area_name_total'))
                    // ->groupBy('area_name')
                    // ->get();
                    
                    $area_name_total2 = DB::table('comments')
                                                ->select('area_name', DB::raw('count(*) as area_name_total'))
                                                ->groupBy('area_name')
                                                ->orderBy('c_id')
                                        ->get();
            $area_name_arr2 = [];
            $area_name_total_arr2 = [];
            foreach($area_name_total2 as $area_name2){
               array_push($area_name_arr2,$area_name2->area_name);
            }

  // echo '<pre>';
  // print_r($area_name_arr2);
            

            $area_name_last_comment = '';
            $area_name_total22 = DB::table('comments')->whereIn('area_name',$area_name_arr2)->orderBy('c_id', 'DESC')->get();
            if($area_name_total22->count() > 0){
              $area_name_last_comment = $area_name_total22->first()->area_name;
            }
// echo $area_name_last_comment;

            $sorted_arr = [];
            $unsorted_arr = [];
            foreach($area_name_arr2 as $area_name2_sort){
              if($area_name2_sort == $area_name_last_comment){
                array_push($sorted_arr,$area_name2_sort);
              }else{
                array_push($unsorted_arr,$area_name2_sort);
              }
              
           }
          //  echo '<pre>';
          //  print_r($sorted_arr);
          //  echo '<pre>';
          //  print_r($unsorted_arr);

           $final_sorted_arr = array_merge($sorted_arr,$unsorted_arr);

          //  echo '<pre>';
          //  print_r($final_sorted_arr);

          //   die;
            
            //SHAHZAIB
        //     $area_name_total2 = DB::table('comments')
        //     ->select('comment', DB::raw('count(*) as comment_total'))
        //     ->groupBy('comment')
        //     ->orderBy('c_id', 'desc')
        //     ->get();
        
        // $area_name_arr2 = [];
        // $area_name_total_arr2 = [];
        
        // foreach ($area_name_total2 as $area_name2) {
        //     array_push($area_name_arr2, $area_name2->comment);
        //     array_push($area_name_total_arr2, $area_name2->comment_total);
        // }
        
        // // Move the last entry to the front of the arrays
        // $lastIndex = count($area_name_arr2) - 1;
        // $lastEntry = [
        //     'comment' => $area_name_arr2[$lastIndex],
        //     'comment_total' => $area_name_total_arr2[$lastIndex]
        // ];
        // array_splice($area_name_arr2, $lastIndex, 1);
        // array_splice($area_name_total_arr2, $lastIndex, 1);
        // array_unshift($area_name_arr2, $lastEntry['comment']);
        // array_unshift($area_name_total_arr2, $lastEntry['comment_total']);

        
        // 6-Most answered questions (by vote)
            /*First i will get repeated questions ids*/
                    $q_id_total = DB::table('answer')
                    ->select('q_id', DB::raw('count(*) as q_id_total'))
                    ->groupBy('q_id')
                    ->get();

            //echo '<pre>';
            //print_r($area_name_total);
            $q_id_arr = [];
            $q_id_total_arr = [];
            foreach($q_id_total as $q_id){
              //$area_name_arr = $area_name->area_name;
              //$area_name_total_arr = $area_name->area_name_total;
              array_push($q_id_arr,$q_id->q_id);
              array_push($q_id_total_arr,$q_id->q_id_total);
            }

            //echo '<pre>';
            //print_r($q_id_arr);
            //die;
        
        // 7-Most answered questions (comments)
            /*First i will get repeated questions ids*/
                    $q_id_totalc = DB::table('comments')
                    ->select('q_id', DB::raw('count(*) as q_id_total'))
                    ->groupBy('q_id')
                    ->get();

            //echo '<pre>';
            //print_r($area_name_total);
            $q_id_arrc = [];
            $q_id_total_arrc = [];
            foreach($q_id_totalc as $q_idc){
              //$area_name_arr = $area_name->area_name;
              //$area_name_total_arr = $area_name->area_name_total;
              array_push($q_id_arrc,$q_idc->q_id);
              array_push($q_id_total_arrc,$q_idc->q_id_total);
            }


 
 ?>

      <main class="content-wrapper">
        <div class="mdc-layout-grid">
          <div class="mdc-layout-grid__inner">
           
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-8">
              <div class="mdc-layout-grid__inner">
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                  <div class="mdc-card py-3 pl-2 d-flex flex-row align-item-center">
                    <div class="mdc--tile mdc--tile-danger rounded">
                      <i class="mdi mdi-account-settings text-white icon-md"></i>
                    </div>
                    <div class="text-wrapper pl-1">
                      <h3 class="mdc-typography--display1 font-weight-bold mb-1">{{$total_users}}</h3>
                      <p class="font-weight-normal mb-0 mt-0">Total Signed Up Users</p>
                     
                    </div>
                  </div>
                </div>
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                  <div class="mdc-card py-3 pl-2 d-flex flex-row align-item-center">
                    <div class="mdc--tile mdc--tile-success rounded">
                      <i class="mdi mdi-basket text-white icon-md"></i>
                    </div>
                    <div class="text-wrapper pl-1">
                      <h3 class="mdc-typography--display1 font-weight-bold mb-1">{{$total_votes}}</h3>
                      <p class="font-weight-normal mb-0 mt-0">Total Votes</p>
                    </div>
                  </div>
                </div>
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                  <div class="mdc-card py-3 pl-2 d-flex flex-row align-item-center">
                    <div class="mdc--tile mdc--tile-warning rounded">
                      <i class="mdi mdi-ticket text-white icon-md"></i>
                    </div>
                    <div class="text-wrapper pl-1">
                      <h3 class="mdc-typography--display1 font-weight-bold mb-1">{{$total_comments}}</h3>
                      <p class="font-weight-normal mb-0 mt-0">Total Comments</p>
                    </div>
                  </div>
                </div>
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                  <div class="mdc-card py-3 pl-2 d-flex flex-row align-item-center">
                    <div class="mdc--tile mdc--tile-primary rounded">
                      <i class="mdi mdi-account-star text-white icon-md"></i>
                    </div>
                    <div class="text-wrapper pl-1">
                      <h3 class="mdc-typography--display1 font-weight-bold mb-1">{{$total_users_disabled}}</h3>
                      <p class="font-weight-normal mb-0 mt-0">Total Not Active Users</p>
                    </div>
                  </div>
                </div>
              </div>
              <?php 
                       
                       //echo '<pre>';
                       //print_r($area_name_arr);
                       //echo '<pre>';
                       //print_r($area_name_total_arr);
                      ?>
            </div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
              <!--<div class="mdc-card d-flex flex-column">-->
              <!--  <div class="mdc-layout-grid__inner flex-grow-1">-->
              <!--    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3"></div>-->
              <!--    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6 d-flex align-item-center flex-column">-->
              <!--      <h2 class="mdc-card__title mdc-card__title--large text-center mt-2 mb-2">Time, Practice</h2>-->
              <!--      <div id="currentBalanceCircle" class="w-100"></div>-->
              <!--    </div>-->
              <!--    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3"></div>-->
              <!--  </div>-->
              <!--  <div class="mdc-layout-grid__inner">-->
              <!--    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">-->
              <!--      <section class="mdc-card__action-footer mt-4 bg-red w-100">-->
              <!--        <div class="col mdc-button" data-mdc-auto-init="MDCRipple">-->
              <!--          <i class="mdi mdi-store icon-md"></i>-->
              <!--        </div>-->
              <!--        <div class="col mdc-button" data-mdc-auto-init="MDCRipple">-->
              <!--          <i class="mdi mdi-phone-plus icon-md"></i>-->
              <!--        </div>-->
              <!--        <div class="col mdc-button" data-mdc-auto-init="MDCRipple">-->
              <!--          <i class="mdi mdi-share-variant icon-md"></i>-->
              <!--        </div>-->
              <!--        <div class="col mdc-button" data-mdc-auto-init="MDCRipple">-->
              <!--          <i class="mdi mdi-autorenew icon-md"></i>-->
              <!--        </div>-->
              <!--      </section>-->
              <!--    </div>-->
              <!--  </div>-->
              <!--</div>-->
            </div>
            <!-- <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
              <div class="mdc-card card--with-avatar">
                <section class="mdc-card__primary">
                  <div class="card__avatar"><img src="images/faces/face1.jpg" alt=""></div>
                  <h1 class="mdc-card__title">Daniel Russel</h1>
                  <h2 class="mdc-card__subtitle">@danielrussel</h2>
                  <span class="social__icon-badge mdc-twitter mdi mdi-twitter"></span>
                </section>
                <section class="mdc-card__supporting-text pt-1">
                  <p class="mb-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam condimentum sem non mauris euismod hendrerit.Aliquam condimentum sem non mauris euismod hendrerit.</p>
                  <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam condimentum.</p>
                </section>
                <section class="mdc-card__social-footer bg-blue">
                  <div class="col">
                    <small>TWEETS</small>
                    <p>768.8k</p>
                  </div>
                  <div class="col">
                    <small>FOLLOWING</small>
                    <p>186.8k</p>
                  </div>
                  <div class="col">
                    <small>FOLLOWING</small>
                    <p>25.8k</p>
                  </div>
                </section>
              </div>
            </div> -->
            <!-- <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-8">
              <div class="mdc-card px-2 py-2">
                <div id="js-legend" class="chartjs-legend mb-2"></div>
                <canvas id="dashboard-monthly-analytics" height="205"></canvas>
              </div>
            </div> -->
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
              <div class="mdc-card table-responsive">
                <div class="table-heading px-2 px-1 border-bottom">
                  <h1 class="mdc-card__title mdc-card__title--large">Most votes by locations</h1>
                </div>
                <table id="myTable1" class="table" >
                  <thead>
                    <tr>
                      <th class="text-left">Location</th>
                      <th>Number of Votes</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($area_name_arr)
                        @foreach($area_name_arr as $key => $area_name_val)
                          <tr>
                            <td class="text-left">{{$area_name_val}}</td>
                            <td>{{$area_name_total_arr[$key]}}</td>
                            
                          </tr>
                        @endforeach
                    @endif
                      
                    </tbody>
                  </table>
              </div>
            </div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
              <div class="mdc-card table-responsive">
                <div class="table-heading px-2 px-1 border-bottom">
                  <h1 class="mdc-card__title mdc-card__title--large">Most Comments by locations</h1>
                </div>
                <table id="myTable2" class="table" >
                <thead>
                    <tr>
                      <th style='display:none;'>Serial Number of Comments</th>
                      <th class="text-left">Location</th>
                      <th class="text-left">Comment</th>
                      <th>Number of Comments</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php /*<!-- @if($area_name_arr2)
                        @foreach($area_name_arr2 as $key2 => $area_name_val2)
                          <tr>
                            <td class="text-left">{{$area_name_val2}}</td>
                            <td>{{$area_name_total_arr2[$key2]}}</td>
                          </tr>
                        @endforeach
                    @endif -->*/ ?>

                    @if($final_sorted_arr)
                        @foreach($final_sorted_arr as $k => $area_name_val2)
                        <?php 
                            //Find total comments of location
                            $total_comments_location_sql = DB::table('comments')->where('area_name',$area_name_val2)->orderBy('c_id', 'desc')->get();
                            $total_comments_location = $total_comments_location_sql->count();
                            $last_comment = '';
                            if($total_comments_location > 0 ){
                                $last_comment = $total_comments_location_sql->first()->comment;
                            }
                            
                        ?>
                        <tr>
                            <td style='display:none;'>{{$k+1}}</td>
                            <td class="text-left">{{$area_name_val2}}</td>
                            <td class="text-left">{{$last_comment}}</td>
                            <td>{{$total_comments_location}}</td>
                          </tr>
                        @endforeach
                    @endif
                      
                    </tbody>
          </table>
              </div>
            </div>
            
            
      

        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
              <div class="mdc-card table-responsive">
                <div class="table-heading px-2 px-1 border-bottom">
                  <h1 class="mdc-card__title mdc-card__title--large">Most Question by Votes</h1>
                </div>
                <table id="myTable1" class="table" >
                  <thead>
                    <tr>
                      <th class="text-left">Questions</th>
                      <th>Number of Votes</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($q_id_arr[0] != '')
                        @foreach($q_id_arr as $key => $q_id_val)
                          <?php 
                              //Find question w.r.t q_id
                              $question = DB::table('question')->where('q_id', $q_id_val)->get();
                              if($question->count() > 0) $question =  $question->first()->question; else $question = '';
                          ?>
                          <tr>
                            <td class="text-left">{{$question}}</td>
                            <td>{{$q_id_total_arr[$key]}}</td>
                            
                          </tr>
                        @endforeach
                    @endif
                      
                    </tbody>
                  </table>
              </div>
            </div>


            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
              <div class="mdc-card table-responsive">
                <div class="table-heading px-2 px-1 border-bottom">
                  <h1 class="mdc-card__title mdc-card__title--large">Most Question by Comments</h1>
                </div>
                <table id="myTable1" class="table" >
                  <thead>
                    <tr>
                      <th class="text-left">Questions</th>
                      <th>Number of Comments</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(!empty($q_id_arrc))
                        @foreach($q_id_arrc as $keyc => $q_id_valc)
                          <?php 
                              //Find question w.r.t q_id
                              //$questionc = DB::table('question')->where('q_id', $q_id_valc)->first()->question;
                              
                               $questionc = DB::table('question')->where('q_id', $q_id_valc)->get();
                              if($questionc->count() > 0) $questionc =  $questionc->first()->question; else $questionc = '';
                          ?>
                          <tr>
                            <td class="text-left">{{$questionc}}</td>
                            <td>{{$q_id_total_arrc[$keyc]}}</td>
                            
                          </tr>
                        @endforeach
                    @endif
                      
                    </tbody>
                  </table>
              </div>
            </div>

            </div>
        </div>
            
      </main>

 @endsection


@section('js')

<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    let table1 = new DataTable('#myTable1');
    //let table2 = new DataTable('#myTable2');
    
   // $('#myTable2').DataTable().destroy();
    
    $(document).ready(function () {
        $('#myTable2').DataTable({
            order: [],
        });
    });
</script>    



@endsection
