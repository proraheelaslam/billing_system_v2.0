@php
    $existantClientQoutesArr = $data['clientExistantQoutes'];
    $nonClientQoutesArr = $data['nonClientQoutes'];
   // quote.delete_list
   $showLinkText = 'Facture Prefaite';

   if(request()->segment(count(request()->segments())) == 'delete'  || $type == 'delete'){
                $showLinkText = 'Supprimer';
   }elseif(request()->segment(count(request()->segments())) == 'show'  || $type == 'show'){
                $showLinkText = 'Afficher';
   }

@endphp


@if(count($existantClientQoutesArr) > 0 || count($nonClientQoutesArr) > 0)

    <ul>

        @if(count($existantClientQoutesArr) > 0)
        @foreach($existantClientQoutesArr as $key => $client)

            <li>
                <div class="profile_box ">
                    <div class="menu_box_table">
                        <div class="profile_box_tableCell">
                            <div class="profile_box_text client_list_border">
                                <p>{{$client->last_name}} {{$client->first_name}}</p>
                                <p>{{$client->phone_number}}</p>
                            </div>
                            <div class="profile_box_text">

                                @if(count($client->quotes) > 0)

                                    @foreach($client->quotes as  $quote)

                                        @if(request()->segment(count(request()->segments())) == 'delete'  || $type == 'delete')
                                            <p>
                                                <span >Concerne: </span>{{ $quote->concern_address }} - {{ $quote->concern }}
                                                <a data-type="delete_quote" data-name="{{$quote->concern}}" data-id="{{$quote->id}}" class="newquote_link delete_quote_button"
                                                   href="javascript:void(0)">
                                                    Supprimer
                                                </a>
                                            </p>
                                        @elseif(request()->segment(count(request()->segments())) == 'edit'  || $type == 'edit')
                                            <p>
                                                <span >Concerne: </span>{{ $quote->concern_address }} - {{ $quote->concern }}
                                                <a class="newquote_link"
                                                   href="{{route('pre_draft_bill',  ['id'=>  Hashids::encode($quote->id) , 'q'=> 'edit','type'=>'quote'] )}}">
                                                    Editer
                                                </a>
                                            </p>

                                        @elseif(request()->segment(count(request()->segments())) == 'show'  || $type == 'show')
                                            <p>
                                                <span >Concerne: </span>{{ $quote->concern_address }} - {{ $quote->concern }}
                                                <a class="newquote_link"
                                                   href="{{route('pre_draft_bill',  ['id'=>  Hashids::encode($quote->id) , 'q'=> 'view','type'=>'quote'] )}}">
                                                    Afficher
                                                </a>
                                            </p>

                                        @elseif(request()->segment(count(request()->segments())) ==='pre_bill_quote')


                                            <p>
                                                <span >Concerne: </span>{{ $quote->concern_address }} - {{ $quote->concern }}
                                                <a class="newquote_link"
                                                   href="{{route('pre_draft_bill',  ['id'=> Hashids::encode($quote->id), 'type' => 'pre_bill']  )}}">
                                                    Facture Prefaite
                                                </a>
                                            </p>

                                        @endif



                                    @endforeach

                                @endif
                            </div>
                        </div>
                        <div class="profile_box_tableCell" style="width: 50px !important;">
                            <div class="client_list_arrow" style="display:{{count($client->quotes) > 1 ? 'block' : 'none' }}">
                                <a href="javascript:void(0)"><i class="fa fa-caret-down"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

        @endforeach

        @endif
        @if(count($nonClientQoutesArr) > 0)

              @foreach($nonClientQoutesArr as $key => $quote)

                        <li>
                            <div class="profile_box">
                                <div class="menu_box_table">
                                    <div class="profile_box_tableCell">
                                        <div class="profile_box_text client_list_border">
                                            <p>{{$quote->name}}</p>

                                        </div>
                                        <div class="profile_box_text">

                                            @if(request()->segment(count(request()->segments())) == 'delete'  || $type == 'delete')
                                                    <p>Concerne :  {{ $quote->concern_address }} - {{ $quote->concern }}
                                                        <a data-type="delete_quote" data-name="{{$quote->concern}}" data-id="{{$quote->id}}" class="newquote_link delete_quote_button"
                                                           href="javascript:void(0)">
                                                            Supprimer
                                                        </a>
                                                    </p>
                                            @elseif(request()->segment(count(request()->segments())) == 'edit'  || $type == 'edit')

                                                <p>Concerne :  {{ $quote->concern_address }} - {{ $quote->concern }}
                                                    <a class="newquote_link"
                                                       href="{{route('pre_draft_bill.non_client',  ['id'=> Hashids::encode($quote->id), 'q'=> 'edit','type'=>'quote'] )}}">
                                                        Editer
                                                    </a>
                                                </p>

                                            @elseif(request()->segment(count(request()->segments())) == 'show'  || $type == 'show')

                                                <p>Concerne :  {{ $quote->concern_address }} - {{ $quote->concern }}
                                                    <a class="newquote_link"
                                                       href="{{route('pre_draft_bill.non_client',  ['id'=> Hashids::encode($quote->id), 'q'=> 'view','type'=>'quote'] )}}">
                                                        Afficher
                                                    </a>
                                                </p>

                                            @elseif(request()->segment(count(request()->segments())) ==='pre_bill_quote')

                                                <p>Concerne :  {{ $quote->concern_address }} - {{ $quote->concern }}
                                                    <a class="newquote_link"
                                                       href="{{route('pre_draft_bill.non_client',  ['id'=> Hashids::encode($quote->id),'type' => 'pre_bill'] )}}">
                                                        Facture Prefaite
                                                    </a>
                                                </p>

                                            @endif
                                        </div>
                                    </div>
                                    <div class="profile_box_tableCell" style="width: 50px !important;">
                                        <div class="client_list_arrow" style="display: none">
                                            <a href="javascript:void(0)"><i class="fa fa-caret-down"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                    @endforeach

            @endif


    </ul>
@endif





@if(count($existantClientQoutesArr) == 0 && count($nonClientQoutesArr) == 0)
    <ul>
        <li>
            <div class="profile_box">
                <p style="text-align: center">No data found!</p>
            </div>
        </li>
    </ul>
@endif