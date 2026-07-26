@extends('layouts.dashboard')

@section('dashboard_content')
<div class="card mb-4">
  <div class="card-header">
    <h5 class="card-title m-0">Penggunaan Shortcode Ikon Tabler</h5>
  </div>
  <div class="card-body">
    <p class="small text-muted">Seluruh ikon disisipkan secara inline SVG menggunakan shortcode 11ty <code>{% raw %}<x-icon name="nama-ikon" />{% endraw %}</code>.</p>
    <div class="p-3 bg-body-tertiary border rounded font-monospace small">
      {% raw %}<x-icon name="home" />{% endraw %}<br>
      {% raw %}<x-icon name="user" class="text-primary" />{% endraw %}<br>
      {% raw %}{% icon "settings", { type: "filled" } %}{% endraw %}
    </div>
  </div>
</div>

<div class="card">
  <div class="card-header">
    <h5 class="card-title m-0">Contoh Ikon Populer</h5>
  </div>
  <div class="card-body">
    <div class="row g-3 text-center">
      <div class="col-4 col-sm-3 col-md-2">
        <div class="p-3 border rounded">
          <div class="text-primary mb-2"><x-icon name="home" /></div>
          <div class="small text-muted">home</div>
        </div>
      </div>
      <div class="col-4 col-sm-3 col-md-2">
        <div class="p-3 border rounded">
          <div class="text-success mb-2"><x-icon name="user" /></div>
          <div class="small text-muted">user</div>
        </div>
      </div>
      <div class="col-4 col-sm-3 col-md-2">
        <div class="p-3 border rounded">
          <div class="text-info mb-2"><x-icon name="settings" /></div>
          <div class="small text-muted">settings</div>
        </div>
      </div>
      <div class="col-4 col-sm-3 col-md-2">
        <div class="p-3 border rounded">
          <div class="text-warning mb-2"><x-icon name="bell" /></div>
          <div class="small text-muted">bell</div>
        </div>
      </div>
      <div class="col-4 col-sm-3 col-md-2">
        <div class="p-3 border rounded">
          <div class="text-danger mb-2"><x-icon name="trash" /></div>
          <div class="small text-muted">trash</div>
        </div>
      </div>
      <div class="col-4 col-sm-3 col-md-2">
        <div class="p-3 border rounded">
          <div class="text-primary mb-2"><x-icon name="search" /></div>
          <div class="small text-muted">search</div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection