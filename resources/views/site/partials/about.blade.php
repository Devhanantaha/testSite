<!-- ABOUT SECTION -->
<section id="about-section" class="py-5" style="background: linear-gradient(135deg, #005aac 0%, #00b66d 100%); color: #fff;">
  <div class="container text-center">
    <h2 class="fw-bold mb-3">{{ $about->aboutTitle }}</h2>
    <div class="mx-auto mb-4" style="width:60px;height:3px;background:#fff;border-radius:2px;"></div>
    <p class="lead mx-auto" style="max-width:800px; line-height:1.6;" id="about-text">
      {!! \Illuminate\Support\Str::limit(strip_tags($about->aboutDescription), 300) !!}
    </p>
    <button class="btn btn-outline-light btn-sm rounded-pill mt-2" id="toggle-about">
                 {{ __('site.readmore') }}

    </button>
  </div>
</section>

<!-- INFO BOXES SECTION -->
<section id="info-boxes" class="py-5" style="background:#f9f9f9;">
  <div class="container">
    <div class="row g-4">

      <!-- Box 1: Goals -->
      <div class="col-lg-4 col-md-6">
        <div class="info-box h-100 p-4 text-white" style="background: linear-gradient(135deg, #82bc41 0%, #a8d08d 100%); border-radius:12px; position:relative; overflow:hidden;">
          <i class="icon-bulb" style="font-size:40px; opacity:0.2; position:absolute; right:20px; top:20px;"></i>
          <h4 class="fw-bold mb-3">{{ $about->goalsTitle }}</h4>
          <p>{{ \Illuminate\Support\Str::limit(strip_tags($about->goalsDescription), 180) }}</p>
          <a href="{{ url('goals-details') }}" class="btn btn-light btn-sm rounded-pill fw-bold text-uppercase mt-2">
            {{ __('site.readmore') }}
          </a>
        </div>
      </div>

      <!-- Box 2: Mission -->
      <div class="col-lg-4 col-md-6">
        <div class="info-box h-100 p-4 text-white" style="background: linear-gradient(135deg, #f7a81b 0%, #ffd966 100%); border-radius:12px; position:relative; overflow:hidden;">
          <i class="icon-cog" style="font-size:40px; opacity:0.2; position:absolute; right:20px; top:20px;"></i>
          <h4 class="fw-bold mb-3">{{ $about->missionTitle }}</h4>
          <p>{{ \Illuminate\Support\Str::limit(strip_tags($about->missionDescription), 180) }}</p>
          <a href="{{ url('/mission-details') }}" class="btn btn-light btn-sm rounded-pill fw-bold text-uppercase mt-2">
            {{ __('site.readmore') }}
          </a>
        </div>
      </div>

      <!-- Box 3: about -->
      <div class="col-lg-4 col-md-12">
        <div class="info-box h-100 p-4 text-white" style="background: linear-gradient(135deg, #005aac 0%, #3380cc 100%); border-radius:12px; position:relative; overflow:hidden;">
          <i class="icon-thumbs-up" style="font-size:40px; opacity:0.2; position:absolute; right:20px; top:20px;"></i>
          <h4 class="fw-bold mb-3">{{ $about->historyTitle }}</h4>
          <p>{{ \Illuminate\Support\Str::limit(strip_tags($about->historyDescription), 180) }}</p>
          <a href="{{ url('history-details' ) }} " class="btn btn-light btn-sm rounded-pill fw-bold text-uppercase mt-2">
            {{ __('site.readmore') }}
          </a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- JS for Show More / Less -->
<script>
document.addEventListener('DOMContentLoaded', function () {
  const button = document.getElementById('toggle-about');
  const text = document.getElementById('about-text');
  const fullText = `{!! addslashes(strip_tags($about->description)) !!}`;
  const shortText = `{!! \Illuminate\Support\Str::limit(strip_tags($about->description), 300) !!}`;
  let expanded = false;

  button.addEventListener('click', function () {
    expanded = !expanded;
    text.innerHTML = expanded ? fullText : shortText;
    button.textContent = expanded ? "{{ __('site.readless') }}" : "{{ __('site.readmore') }}";
  });
});
</script>

<style>
/* === GENERAL STYLING === */
section {
  scroll-margin-top: 80px;
}

/* About Section */
#about-section h2 {
  font-size: 2.2rem;
}
#about-section p {
  font-size: 1rem;
  color: #fff;
}

/* Info Boxes */
.info-box {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  min-height: 280px;
}
.info-box:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}
.info-box h4 {
  font-size: 1.25rem;
}
.info-box p {
  font-size: 0.95rem;
  line-height: 1.6;
}
.info-box .btn {
  font-size: 0.8rem;
}
</style>
