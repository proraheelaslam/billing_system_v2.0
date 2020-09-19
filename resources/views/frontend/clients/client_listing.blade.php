@if(count($clients) > 0)

@php
     $cellWidth = '50px';
     $showProfileSec = 'block';
     $showBillButton = 'none';
     $showLinkText = 'Nouvelle facture';
     if(request()->segment(count(request()->segments())) == 'delete'  || $type == 'delete'){
                $cellWidth = '76px';
      }elseif (request()->segment(count(request()->segments())) == 'show' || $type == 'show'){
                $cellWidth = '66px';
      }elseif (request()->segment(count(request()->segments())) == 'bill' ||  $type == 'bill'){
                $showProfileSec = 'none';
                $showBillButton = 'block';
      }elseif (request()->segment(count(request()->segments())) == 'folder' ||  $type == 'folder'){
                $showProfileSec = 'none';
                $showBillButton = 'block';
                $showLinkText = 'Dossier';
      }

@endphp

<ul>

    @foreach($clients as $client)
      <li>
        <div class="profile_box">
          <div class="menu_box_table">
            <div class="profile_box_tableCell">
              <div class="profile_box_text client_list_border">
                <p>{{$client->last_name}} {{ $client->first_name  }}</p>
                <p>{{$client->phone_number}}</p>
              </div>
              <div class="profile_box_text">
                {{--<p>{{ $client->street }} {{ $client->street_number }} ; {{ $client->postal_code }} {{ $client->municipality }}</p>--}}
                @php  $workAddressArr = json_decode($client->work_address, true) @endphp
                @if(($workAddressArr))

                  @foreach($workAddressArr as $address)

                      {{--client.folder_list--}}
                      @if (request()->segment(count(request()->segments())) == 'folder' ||  $type == 'folder')

                              <p>{{ $address['street'] }} {{ $address['street_number'] }} ; {{ $address['postal_code'] }} {{ $address['municipality'] }}
                                  <a style="display: {{$showBillButton}}" class="newquote_link" href="{{route('client.folder_list', ['clientId'=> Hashids::encode($client->id),'id'=> $address['id']])}}">{{$showLinkText}}</a>
                              </p>
                       @else
                              <p>{{ $address['street'] }} {{ $address['street_number'] }} ; {{ $address['postal_code'] }} {{ $address['municipality'] }}
                                  <a style="display: {{$showBillButton}}" class="newquote_link" href="{{route('quote.single', ['clientId'=> Hashids::encode($client->id),'id'=> $address['id'],'q'=> 'bill'])}}">{{$showLinkText}}</a>
                              </p>
                          @endif

                  @endforeach

                @endif
              </div>
            </div>
            <div class="profile_box_tableCell" style="width: {{$cellWidth}};">
              <div class="profile_box_text" style="display: {{ $showProfileSec }}">
                @if(request()->segment(count(request()->segments())) == 'delete' || $type == 'delete')
                   <a data-name="{{$client->last_name }} {{$client->first_name }}" data-id="{{$client->id}}" class="clientList_edit_btn delete_client_button" href="javascript:void(0)">Supprimer</a>

                @elseif(request()->segment(count(request()->segments())) == 'show' || $type == 'show')

                  <a class="clientList_edit_btn" href="{{route('client_list.show', Hashids::encode($client->id))}}">Afficher</a>

                @elseif(request()->segment(count(request()->segments())) == 'bill' || $type == 'bill')

                      <a class="clientList_edit_btn" href="{{route('client_list.show', Hashids::encode($client->id))}}">Nouvelle facture</a>

                  @elseif(request()->segment(count(request()->segments())) == 'clients' || $type == 'clients')

                      <a class="clientList_edit_btn" href="{{route('client.edit', Hashids::encode($client->id))}}">Editer</a>

                  @endif
              </div>
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