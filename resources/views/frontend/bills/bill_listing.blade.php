<div class="dashboard_rowMain">
    @php

        $bills = $data['bills'];
        $total_unpaid = $data['total_unpaid'];
        $total_paid =   $data['total_paid'];


    @endphp
    <div class="dashboard_row">
        <div class="dashboard_haeding border_red">
            <strong>Factures Impayees (<span id="total_unpaid_bill_span">{{$total_unpaid}}</span>)</strong>
        </div>
        <ul id="unpaid_bill_lists">
            @if(count($bills) > 0)
                @foreach($bills as $bill)
                    @if($bill->status === 'unpaid')

                        <li>
                            <div class="profile_box">
                                <div class="menu_box_table">
                                    <div class="tableCell width60">
                                        <div class="dashboard_text">
                                            <strong>{{$bill->name }} - {{number_format((float)$bill->total, 2)}} euros:</strong>
                                            <p>Concerne: {{$bill->concern_address}} - {{$bill->concern}}</p>
                                        </div>
                                    </div>
                                    <div class="tableCell">
                                        <div class="dashboard_text">
                                            <strong>Facture: {{$bill->document_number}}</strong>
                                        </div>
                                        <div class="dashboard_switch">
                                            <div class="onoff_switch">
                                                <a data-id="{{$bill->id}}" data-type="{{$bill->status}}" class="update_bill_status" href="javascript:void(0);"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>


                    @endif
                @endforeach

            @endif


        </ul>
    </div>
    <div class="dashboard_row">
        <div class="dashboard_haeding">
            <strong>Factures Payees (<span id="total_paid_bill_span">{{$total_paid}}</span>)</strong>
        </div>
        <ul id="paid_bill_lists">
            @if(count($bills) > 0)
                @foreach($bills as $bill)
                    @if($bill->status === 'paid')
                        <li >
                            <div class="profile_box">
                                <div class="menu_box_table">
                                    <div class="tableCell width60">
                                        <div class="dashboard_text">
                                            <strong>{{$bill->name }} - {{number_format((float)$bill->total, 2)}} euros:</strong>
                                            <p>Concerne: {{$bill->concern_address}} - {{$bill->concern}}</p>
                                        </div>
                                    </div>
                                    <div class="tableCell">
                                        <div class="dashboard_text">
                                            <strong>Facture: {{$bill->document_number}}</strong>
                                        </div>
                                        <div class="dashboard_switch">
                                            {{--disabled_class--}}
                                            <div class="onoff_switch ">
                                                <a  data-id="{{$bill->id}}" data-type="{{$bill->status}}" class="update_bill_status paid_revert_bill_btn active" href="javascript:void(0);"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($bill->is_final_review_bill === 0)
                                <a data-id="{{$bill->id}}" class="dash_left_icon final_review_btn" href="javascript:void(0);"></a>
                            @endif

                        </li>
                        @endif
                        @endforeach
                        @endif


        </ul>
    </div>
</div>