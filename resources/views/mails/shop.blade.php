<p>請點擊以下按鈕進行帳號開通</p>
<td width="80" >
<form action="{{ route('checkupdate', $id) }}" method="POST">
{{ csrf_field() }}
{{ method_field('PATCH') }}
<button class="btn btn-primary" >驗證</button>
</form> 
</td>