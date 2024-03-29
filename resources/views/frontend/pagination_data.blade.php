<?php /*        <!-- <div  class="table-responsive">
                <table>
                    <tr>
                        <th width='5%'>ID</th>
                        <th width='38%'>COMMENTS</th>
                        <th width='57%'>AREA NAME</th>
                    </tr>

                    @foreach($data as $row)
                        <td>{{ $row->c_id}}</td>   
                        <td>{{ $row->comment}}</td>   
                        <td>{{ $row->area_name}}</td>   
                    @endforeach
                </table>
                
           </div>
           {!! $data->links('frontend/pagination_html', ['data'=>$data]) !!} -->
           */ ?>
           <?php
                $u_name = Auth::guard('users')->user()->name;
                $u_id2 = Auth::guard('users')->user()->id;
            ?>
           <?php
                  // $comments = DB::table('comments as c')->join('users as u', 'c.u_id', 'u.id')->select('c.*','u.name as username')->orderby('c.created_at', 'DESC');
                  // if(Session::has('area_name')){
                  //     //$comments->where('c.area_name', "{Session::get('area_name')}");
                  //     // $comments =   $comments->where('c.area_name', 'LIKE', "%{Session::get('area_name')}%");
                  //     $comments = $comments->where('c.area_name', Session::get('area_name'));
                  // }

                  // $comments = $comments->where('c.q_id', $questions->q_id)->get();
                  // // print_r($comments)

                  $comments = false;
                  if (Session::has('area_name')) {
                  $comments = DB::table('comments as c')
                                                      ->join('users as u', 'c.u_id', 'u.id')
                                                      ->select('c.*', 'u.name as username')
                                                      ->orderBy('c.c_id', 'DESC');
                                                            $areaName = Session::get('area_name');
                                                            $comments->where('c.area_name', 'LIKE', "$areaName");
                                                            $comments->where('c.q_id', $q_id);
                                                            $comments = $comments->paginate(3);
                  }
                  //if (Auth::check()) {
                    //$userId = Auth::id();
                    //$comments->where('c.u_id', $userId);
                  //}
                  // echo $u_id.' => '.$comments->count();
                ?>
       
                @if($comments)
                <div  class="comment-wrapper container container_{{ $q_id }} m-2" >
                          @foreach ($comments as  $key => $comment)
                            @if($comment)
                                  <div style="padding:6px;" class="user-comment single-item id_{{ $q_id }}" data-id='{{ $q_id }}'>
                                
                                    <div class="col-12 d-flex justify-content-between align-items-center">
                                      <div class="username-container">
                                        <span class="user-name">{{ $comment->username  }}</span>
                                      </div>
                                      <div>
                                          <i class="fa fa-x"></i>
                                            <span class="date">{{ date("d F Y" , strtotime($comment->created_at)) }}
                                                  <!-- @if($comment->u_id == $u_id2)
                                                    <div class="close_btn ">
                                                    <button type="button" class="btn-close" onclick="delcomments({{$comment->c_id}})" ></button>
                                                    </div>
                                                    @endif
                                                          -->
                                            @if($comment->u_id == $u_id2)
                                                <button type="button" class="btn-close" onclick="delcomments({{$comment->c_id}})" ></button>
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
               
                <div style="margin-top: 5px;    margin-bottom: -10px;"> {!! $comments->appends(['id' => $q_id])->links('frontend/pagination_html', ['data'=>$comments]) !!}</div>
                @endif
