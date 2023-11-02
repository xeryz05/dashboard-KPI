@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('assets/img/logo/verdanco-removebg-preview.png') }}" class="logo" alt="Laravel Logo">
@else
<img src="{{ asset('assets/img/logo/verdanco-removebg-preview.png') }}" class="logo" alt="Laravel Logo">
@endif
</a>
</td>
</tr>
