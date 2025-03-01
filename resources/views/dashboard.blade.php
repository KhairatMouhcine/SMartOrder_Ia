@extends('layouts.user_type.auth')

@section('content')

  <div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Gain du jour </p>
                  <h5 class="font-weight-bolder mb-0">
                    {{ number_format($chiffreAffaires, 2) }} MAD
                  </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Commandes du jour</p>
                  <h5 class="font-weight-bolder mb-0">
                    {{ $commandesToday }}
                  </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Nouveaux clients </p>
                   <h5 class="font-weight-bolder mb-0">
                    {{ $nouveauxClients }}
                  </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total utilisateurs</p>
                  <h5 class="font-weight-bolder mb-0">
                    {{ $totalUsers }}
                  </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="row mt-4">
  <div class="col-lg-7 mb-lg-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-lg-6">
            <div class="d-flex flex-column h-100">
              <p class="mb-1 pt-2 text-bold">Plateforme intelligente</p>
              <h5 class="font-weight-bolder">SmartOrderAI</h5>
              <p class="mb-5">
                Gagnez du temps grâce à notre assistant intelligent. Gérez vos commandes, réservations
                et utilisateurs via une interface intuitive et automatisée.
              </p>
              <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                Découvrir
                <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
            <div class="bg-gradient-primary border-radius-lg h-100">
              <img src="../assets/img/shapes/waves-white.svg"
                   class="position-absolute h-100 w-50 top-0 d-lg-block d-none"
                   alt="waves">
              <div class="position-relative d-flex align-items-center justify-content-center h-100">
                <img class="w-100 position-relative z-index-2 pt-4"
                     src="../assets/img/illustrations/rocket-white.png"
                     alt="SmartOrder Rocket">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-5">
    <div class="card h-100 p-3">
      <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100"
           style="background-image: url('../assets/img/restaurant-bg.jpg');">
        <span class="mask bg-gradient-dark"></span>
        <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
          <h5 class="text-white font-weight-bolder mb-4 pt-2">Automatisez votre service</h5>
          <p class="text-white">
            Grâce à SmartOrderAI, offrez une expérience client fluide et innovante :
            chatbot, gestion des tables, commandes instantanées.
          </p>
          <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
            En savoir plus
            <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

  <div class="row mt-4">
    
    <div class="col-lg-12">
      <div class="card z-index-2">
        <div class="card-header pb-0">
          <h6>Sales overview</h6>
          
        </div>
        <div class="card-body p-3">
          <div class="chart">
           <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                @push('dashboard')
              <script>
                document.addEventListener('DOMContentLoaded', function () {
                  const ctx2 = document.getElementById("chart-line").getContext("2d");

                  const gradientStroke = ctx2.createLinearGradient(0, 230, 0, 50);
                  gradientStroke.addColorStop(1, 'rgba(203,12,159,0.2)');
                  gradientStroke.addColorStop(0.2, 'rgba(203,12,159,0.0)');
                  gradientStroke.addColorStop(0, 'rgba(203,12,159,0)');

                  const labels = @json($labels);
                  const data = @json($totals);

                  new Chart(ctx2, {
                    type: "line",
                    data: {
                      labels: labels,
                      datasets: [{
                        label: "Chiffre d'affaires",
                        tension: 0.4,
                        borderWidth: 3,
                        pointRadius: 0,
                        borderColor: "#cb0c9f",
                        backgroundColor: gradientStroke,
                        fill: true,
                        data: data,
                        maxBarThickness: 6
                      }]
                    },
                    options: {
                      responsive: true,
                      maintainAspectRatio: false,
                      plugins: {
                        legend: {
                          display: false,
                        }
                      },
                      interaction: {
                        intersect: false,
                        mode: 'index',
                      },
                      scales: {
                        y: {
                          grid: {
                            drawBorder: false,
                            display: true,
                            drawTicks: false,
                            color: 'rgba(200,200,200,0.2)'
                          },
                          ticks: {
                            display: true,
                            padding: 10,
                            color: '#7b809a',
                            font: {
                              size: 12,
                              family: "Open Sans"
                            },
                            callback: function(value) {
                              return value + ' MAD';
                            }
                          }
                        },
                        x: {
                          grid: {
                            drawBorder: false,
                            display: false,
                            drawTicks: false
                          },
                          ticks: {
                            color: '#7b809a',
                            padding: 20,
                            font: {
                              size: 12,
                              family: "Open Sans"
                            }
                          }
                        }
                      }
                    }
                  });
                });
                </script>
                @endpush






          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row my-4">
 <div class="row mt-4">
  <!-- Dernières Commandes -->
  <div class="col-md-6 mb-4">
    <div class="card">
      <div class="card-header pb-0 d-flex justify-content-between align-items-center">
        <h6 class="mb-0">
          <i class="ni ni-box-2 text-primary me-2"></i> Dernières commandes
        </h6>
        <span class="text-sm text-muted">
          <i class="ni ni-check-bold text-success me-1"></i> {{ $lastOrders->count() }} commandes récentes
        </span>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-3">
          <table class="table align-items-center text-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Client</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Montant</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
              </tr>
            </thead>
            <tbody>
              @foreach($lastOrders as $order)
              <tr>
                <td class="text-sm font-weight-bold ">{{ $order->user->name }}</td>
                <td class="text-sm text-primary">{{ number_format($order->total, 2) }} MAD</td>
                <td class="text-sm text-muted">{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Réservations -->
  <div class="col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-header pb-0">
        <h6>
          <i class="ni ni-calendar-grid-58 text-info me-2"></i> Réservations
        </h6>
        <p class="text-sm text-muted mt-1">
          <i class="fas fa-arrow-up text-success"></i>
          {{ $lastReservations->count() }} récentes cette semaine
        </p>
      </div>
      <div class="card-body px-3 pb-3">
        @forelse($lastReservations as $res)
        <div class="d-flex justify-content-between mb-3 border-bottom pb-2">
          <div>
            <h6 class="mb-0 text-sm">{{ $res->nom }}</h6>
            <small class="text-muted">Pour {{ $res->nbre_personnes }} personnes • {{ \Carbon\Carbon::parse($res->created_at)->format('d M Y') }}</small>
          </div>
          <span class="badge bg-gradient-info">{{ $res->restaurant->nom }}</span>
        </div>
        @empty
        <p class="text-muted text-sm">Aucune réservation récente.</p>
        @endforelse
      </div>
    </div>
  </div>
</div>


  
</div>


@endsection
@push('dashboard')
  <script>
    window.onload = function() {
      var ctx = document.getElementById("chart-bars").getContext("2d");

      new Chart(ctx, {
        type: "bar",
        data: {
          labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
            label: "Sales",
            tension: 0.4,
            borderWidth: 0,
            borderRadius: 4,
            borderSkipped: false,
            backgroundColor: "#fff",
            data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
            maxBarThickness: 6
          }, ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
              },
              ticks: {
                suggestedMin: 0,
                suggestedMax: 500,
                beginAtZero: true,
                padding: 15,
                font: {
                  size: 14,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
                color: "#fff"
              },
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false
              },
              ticks: {
                display: false
              },
            },
          },
        },
      });


      var ctx2 = document.getElementById("chart-line").getContext("2d");

      var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

      gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
      gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
      gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

      var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

      gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
      gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
      gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

      new Chart(ctx2, {
        type: "line",
        data: {
          labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
              label: "Mobile apps",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#cb0c9f",
              borderWidth: 3,
              backgroundColor: gradientStroke1,
              fill: true,
              data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
              maxBarThickness: 6

            },
            {
              label: "Websites",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#3A416F",
              borderWidth: 3,
              backgroundColor: gradientStroke2,
              fill: true,
              data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
              maxBarThickness: 6
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                padding: 10,
                color: '#b2b9bf',
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                color: '#b2b9bf',
                padding: 20,
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
          },
        },
      });
    }
  </script>
@endpush

