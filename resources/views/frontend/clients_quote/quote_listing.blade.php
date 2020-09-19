
@php
  if(request()->segment(count(request()->segments())) == 'clients_quote'  || $type == 'clients_quote'){
       $showLinkText = 'Nouveau Devis';

  }

@endphp
@if(count($clients) > 0)



  <ul>
    @foreach($clients as $key => $client)

      <li>
    <div class="profile_box">
      <div class="menu_box_table">
        <div class="profile_box_tableCell">
          <div class="profile_box_text client_list_border">
            <p>{{$client->last_name}} {{ $client->first_name  }}</p>
            <p>{{$client->phone_number}}</p>
          </div>
          <div class="profile_box_text">
            {{--<p>{{ $client->street }} {{ $client->street_number }} ; {{ $client->postal_code }} {{ $client->municipality }} <a class="newquote_link" href="{{route('quote.single', ['clientId'=> Hashids::encode($client->id),'id'=> 0])}}">Nouveau Devis</a></p>--}}

            @php  $workAddressArr = json_decode($client->work_address, true) @endphp
            @if(count($workAddressArr) > 0)

              @foreach($workAddressArr as $key=>$address)
                <p >{{ $address['street'] }} {{ $address['street_number'] }} ; {{ $address['postal_code'] }} {{ $address['municipality'] }} <a class="newquote_link" href="{{route('quote.single', ['clientId'=> Hashids::encode($client->id),'id'=> $address['id'],'q'=> 'new'])}}">{{$showLinkText}}</a></p>

              @endforeach

            @endif
          </div>
        </div>
        <div class="profile_box_tableCell" style="width: 50px !important;">
          <div class="client_list_arrow" style="display: {{count($workAddressArr) == 1 ? 'none' : 'block'}}">
            <a href="javascript:void(0)"><i class="fa fa-caret-down"></i></a>
          </div>
        </div>
      </div>
    </div>
  </li>

    @endforeach

  </ul>
@else
  <ul>
    <li>
      <div class="profile_box">
        <p style="text-align: center">No data found!</p>
      </div>
    </li>
  </ul>
@endif