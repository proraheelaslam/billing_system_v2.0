@include('frontend.common.head')
<style>
    .pdf_logo {
        width: 100%; height: 85px; margin: auto; padding: 0px;
        margin-top: 40px;
        display: block;
        background-image: url('{{getSettingImage('logo')}}');background-repeat:no-repeat;
        background-position: center;
        background-size: 100% auto;
    }
</style>
<div class="wrapper" role="main">

    <div class="pdf_main">
        <table width="700" border="0" cellpadding="0" cellspacing="0" style="margin: auto; width: 700px;">
            <tbody>
            <tr style="margin-left: 100px">
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" >
                        <tr><td height="10"></td></tr>
                        <tr >
                            <td height="50px" >
                                <p  style="height: 50px; width: 100%;" class="pdf_logo" ></p>
                                    {{--<img  width="350" style=" display: block; margin-left: 200px;" src="{{getSettingImage('logo')}}" alt="#">--}}
                            </td>
                        </tr>
                        <tr><td height="80"></td></tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-bottom: 1px solid #000;border-top: 1px solid #000;">
                        <tr><td height="20"></td></tr>
                        <tr>
                            <td>
                                <table width="100%" border="0" cellpadding="0" cellspacing="0" style=" table-layout: fixed;">
                                    <tr>
                                        <td style="padding: 0px 20px 0px 0px; margin: 0px;">

                                            <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial;">{{@$client['last_name']}}  {{@$client['first_name']}} </p>
                                            <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial;"> {{@$client['street_number']}} {{@$client['street']}}  </p>
                                            <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial;"> {{@$client['municipality']}} </p>
                                            <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial;" >{{@$client['tva_number']}} </p>
                                        </td>
                                        <td style="padding: 0px 20px 0px 0px; margin: 0px;"> </td>
                                        <td style="padding: 0px 0px 0px 0px; margin: 0px;"> </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr><td height="20"></td></tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr><td height="10"></td></tr>
                        <tr>
                            <td>
                                <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial; text-align: center;">
                                    Devis No. <b style="font-weight: bold;">{{$quote_number}}</b>
                                </p>
                            </td>
                        </tr>
                        <tr><td height="10"></td></tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr><td height="10"></td></tr>
                        <tr>
                            <td>
                                <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial;">
                                    {{$user->postal_code}}  {{$user->municipality}} , le {{date('d/m/Y')}}
                                </p>
                            </td>
                        </tr>
                        <tr><td height="10"></td></tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #000;">
                        <tr>
                            <td>
                                <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-bottom:1px solid #000;">
                                    <tr>
                                        <td width="15%" style="padding: 10px;">
                                            <strong style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial; text-align: center;display: block; font-weight: bold;">
                                                Quantite
                                            </strong>
                                        </td>
                                        <td width="50%" style="padding: 10px; border-left: 1px solid #000;">
                                            <strong style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial; text-align: center;display: block; font-weight: bold;">
                                                Description
                                            </strong>
                                        </td>
                                        <td width="20%" style="padding: 10px; border-left: 1px solid #000;">
                                            <strong style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial; text-align: center;display: block; font-weight: bold;">
                                                Prix Unitaire
                                            </strong>
                                        </td>
                                        <td width="15%" style="padding: 10px; border-left: 1px solid #000;">
                                            <strong style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial; text-align: center;display: block; font-weight: bold;">
                                                Total
                                            </strong>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        @if(count($quotes) > 0)
                            @foreach($quotes as $qoute)

                            <tr>
                            <td>
                                <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-bottom:1px solid #000;">
                                    <tr>
                                        <td width="15%" style="padding: 10px;">
                                            <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial; text-align: center;">
                                                {{$qoute['quantity']}}
                                            </p>
                                        </td>
                                        <td width="50%" style="padding: 10px; border-left: 1px solid #000;">
                                            <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial; text-align: center;">
                                                {{$qoute['description']}}
                                            </p>
                                        </td>
                                        <td width="20%" style="padding: 10px; border-left: 1px solid #000;">
                                            <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial; text-align: center;">
                                                {{$qoute['unit_price']}}
                                            </p>
                                        </td>
                                        <td width="15%" style="padding: 10px; border-left: 1px solid #000;">
                                            <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial; text-align: center;">
                                                {{number_format((float)$qoute['sub_total'], 2)}}
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>


                            @endforeach
                        @endif

                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-bottom: 1px solid #000;">
                        <tr><td height="40"></td></tr>
                        <tr>
                            <td>
                                <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #000;max-width: 300px; margin: auto;">
                                    <tr>
                                        <td>
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-bottom:1px solid #000;">
                                                <tr>
                                                    <td width="70%" style="padding: 5px 10px;border-right:1px solid #000;">
                                                        <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial;">
                                                            Total
                                                        </p>
                                                    </td>
                                                    <td width="30%" style="padding: 5px 10px;">
                                                        <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial; text-align: right;">
                                                            {{$sub_total}} €
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-bottom:1px solid #000;">
                                                <tr>
                                                    <td width="70%" style="padding: 5px 10px;border-right:1px solid #000;">
                                                        <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial;">
                                                            TVA - {{$tax}} %
                                                        </p>
                                                    </td>
                                                    <td width="30%" style="padding: 5px 10px;">
                                                        <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial; text-align: right;">
                                                            {{$tva_tax}} €
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0" style="">
                                                <tr>
                                                    <td width="70%" style="padding: 5px 10px;border-right:1px solid #000;">
                                                        <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial;">
                                                            Montant Total
                                                        </p>
                                                    </td>
                                                    <td width="30%" style="padding: 5px 10px;">
                                                        <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial; text-align: right;">
                                                            {{$amount}} €
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr><td height="40"></td></tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr><td height="10"></td></tr>
                        <tr>
                            <td>
                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td>
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="50%" valign="top">
                                                        <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial;">
                                                            {{$user->street}}  {{$user->street_number }}
                                                        </p>
                                                    </td>
                                                    <td width="50%" valign="top">
                                                        <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial; text-align: right;">
                                                            {{$user->postal_code}}  {{$user->municipality}}
                                                        </p>
                                                        <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial; text-align: right;">
                                                            GSM : {{$user->phone_number}}
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr><td height="20"></td></tr>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
