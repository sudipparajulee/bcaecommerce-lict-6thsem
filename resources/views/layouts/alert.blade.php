@if(Session::has('success'))
<div class="fixed right-4 top-4 bg-green-600 px-6 py-4 text-xl text-white font-bold rounded-lg shadow-lg border border-gray-200" id="myalert">
    <p>{{session('success')}}</p>
</div>

<script>
    setTimeout(() => {
        document.getElementById('myalert').style.display = 'none';
    }, 3000);
</script>
@endif
