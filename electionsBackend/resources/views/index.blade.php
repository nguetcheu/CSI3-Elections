<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="uper">

  @if(session()->get('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}
  </div><br />
  @endif

  <table class="table table-striped">

    <thead>
      <tr>
        <td>ID</td>
        <td>Label</td>
        <td>cretaed_at</td>
      </tr>
    </thead>

    <tbody>
      @foreach($region as $region)
      <tr>
        <td>{{$region->id}}</td>
        <td>{{$region->label}}</td>
        <td>{{$region->created_at}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div>