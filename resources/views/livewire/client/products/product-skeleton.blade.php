@for ($i = 0; $i < 12; $i++)
  <div wire:loading class="user-select-none placeholder-glow col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 product-grid-item-lm mb-3">
    <div class="card-item">
      <svg class="bd-placeholder-img card-img-top rounded" width="100%" height="180" xmlns="http://www.w3.org/2000/svg"
        role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
        <title>Placeholder</title>
        <rect width="100%" height="100%" fill="#E5E7EB"></rect>
      </svg>
      <div class="item-info">
        <h3 class="item-title">
          <a class="d-block placeholder col-6 rounded" href="#"></a>
        </h3>
        <div class="item-price">
          <span class="fw-bold placeholder col-6 me-2 rounded"></span>
          <span class="text-decoration-line-through placeholder col-4 rounded"></span>
        </div>
      </div>
    </div>
  </div>
@endfor
