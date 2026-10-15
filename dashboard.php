<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Dashboard</title>
<link rel="stylesheet" href="style.css" />
<style>
  /* Page-specific additions, following the same variables and patterns as style.css */

  .app-shell {
    display: grid;
    grid-template-columns: 240px minmax(0, 1fr);
    min-height: 100vh;
  }

  /* ---- Sidebar ---- */
  .app-sidebar {
    display: flex;
    flex-direction: column;
    gap: 28px;
    padding: 24px 18px;
    background: var(--color-surface);
    border-right: 1px solid rgba(35, 35, 35, 0.08);
  }

  .app-sidebar .logo {
    padding: 0 10px;
    font-size: 19px;
  }

  .side-nav {
    display: grid;
    gap: 2px;
  }

  .side-nav a {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 11px 12px;
    border-radius: 6px;
    color: var(--color-muted);
    text-decoration: none;
    font-size: 15px;
    font-weight: 600;
  }

  .side-nav a .dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: currentColor;
    opacity: 0.5;
  }

  .side-nav a:hover {
    color: var(--color-ink);
    background: var(--color-paper);
  }

  .side-nav a.active {
    color: var(--color-wine);
    background: var(--color-blush);
  }

  .side-nav a.active .dot {
    background: var(--color-wine);
    opacity: 1;
  }

  .sidebar-footer {
    margin-top: auto;
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px;
    border-top: 1px solid rgba(35, 35, 35, 0.08);
  }

  .sidebar-footer .profile-avatar {
    width: 36px;
    height: 36px;
    font-size: 14px;
  }

  .sidebar-footer div p {
    margin: 0;
    line-height: 1.3;
  }

  .sidebar-footer .name {
    font-size: 14px;
    font-weight: 700;
  }

  .sidebar-footer .role {
    font-size: 12px;
    color: var(--color-muted);
  }

  /* ---- Main area ---- */
  .app-main {
    display: flex;
    flex-direction: column;
    min-width: 0;
  }

  .app-topbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    padding: 18px clamp(20px, 3vw, 40px);
    background: rgba(251, 251, 247, 0.9);
    border-bottom: 1px solid rgba(35, 35, 35, 0.08);
    backdrop-filter: blur(18px);
    position: sticky;
    top: 0;
    z-index: 10;
  }

  .app-topbar h1 {
    margin-bottom: 0;
    font-size: 24px;
    font-family: Inter, Arial, sans-serif;
    font-weight: 700;
  }

  .app-topbar .subtitle {
    margin: 2px 0 0;
    color: var(--color-muted);
    font-size: 14px;
  }

  .topbar-actions {
    display: flex;
    align-items: center;
    gap: 14px;
  }

  .search-input {
    padding: 9px 14px;
    width: 220px;
    font: inherit;
    font-size: 14px;
    color: var(--color-ink);
    background: var(--color-paper);
    border: 1px solid rgba(35, 35, 35, 0.14);
    border-radius: 6px;
  }

  .search-input:focus-visible {
    outline: none;
    border-color: var(--color-wine);
  }

  .dashboard-body {
    padding: clamp(20px, 3vw, 40px);
    display: grid;
    gap: 24px;
  }

  /* ---- Stat row ---- */
  .stat-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 18px;
  }

  .stat-card {
    padding: 20px 22px;
    background: var(--color-surface);
    border: 1px solid rgba(35, 35, 35, 0.08);
    border-radius: 8px;
    box-shadow: 0 12px 30px rgba(35, 35, 35, 0.06);
  }

  .stat-card-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 10px;
  }

  .stat-card-head span {
    color: var(--color-muted);
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.04em;
  }

  .stat-card strong {
    display: block;
    font-family: Georgia, 'Times New Roman', serif;
    font-size: 30px;
  }

  .delta {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    margin-top: 6px;
    font-size: 13px;
    font-weight: 700;
  }

  .delta--up {
    color: var(--color-forest);
  }

  .delta--down {
    color: var(--color-wine);
  }

  /* ---- Two column layout ---- */
  .dashboard-grid {
    display: grid;
    grid-template-columns: minmax(0, 1.6fr) minmax(280px, 1fr);
    gap: 24px;
    align-items: start;
  }

  .panel {
    padding: 24px;
    background: var(--color-surface);
    border: 1px solid rgba(35, 35, 35, 0.08);
    border-radius: 8px;
    box-shadow: 0 12px 30px rgba(35, 35, 35, 0.06);
  }

  .panel + .panel {
    margin-top: 24px;
  }

  .panel-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
  }

  .panel-head h2 {
    margin: 0;
    font-size: 18px;
    font-weight: 700;
  }

  .panel-head a {
    color: var(--color-wine);
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
  }

  .panel-head a:hover {
    text-decoration: underline;
  }

  /* Bar chart (pure CSS) */
  .bar-chart {
    display: flex;
    align-items: flex-end;
    gap: 14px;
    height: 180px;
  }

  .bar-col {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-end;
    height: 100%;
    gap: 8px;
  }

  .bar {
    width: 100%;
    max-width: 36px;
    border-radius: 4px 4px 0 0;
    background: linear-gradient(180deg, var(--color-blush), var(--color-wine));
  }

  .bar-col span {
    color: var(--color-muted);
    font-size: 12px;
  }

  /* Table */
  .data-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
  }

  .data-table th {
    padding: 0 0 10px;
    text-align: left;
    color: var(--color-muted);
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.04em;
    border-bottom: 1px solid rgba(35, 35, 35, 0.1);
  }

  .data-table td {
    padding: 12px 0;
    border-bottom: 1px solid rgba(35, 35, 35, 0.06);
  }

  .data-table tr:last-child td {
    border-bottom: 0;
  }

  .order-id {
    font-weight: 700;
  }

  .status-pill {
    padding: 5px 10px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.02em;
    white-space: nowrap;
  }

  .status-pill--delivered {
    background: var(--color-sage);
    color: var(--color-forest);
  }

  .status-pill--transit {
    background: var(--color-blush);
    color: var(--color-wine);
  }

  .status-pill--pending {
    background: #f1eee2;
    color: #8a6d1f;
  }

  /* Top products list */
  .product-list-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 0;
    border-bottom: 1px solid rgba(35, 35, 35, 0.06);
  }

  .product-list-item:last-child {
    border-bottom: 0;
    padding-bottom: 0;
  }

  .product-list-thumb {
    width: 44px;
    height: 44px;
    border-radius: 6px;
    object-fit: cover;
    background: var(--color-sage);
    flex-shrink: 0;
  }

  .product-list-item .name {
    margin: 0 0 2px;
    font-weight: 700;
    font-size: 14px;
  }

  .product-list-item .units {
    margin: 0;
    color: var(--color-muted);
    font-size: 12px;
  }

  .product-list-item .revenue {
    margin-left: auto;
    font-weight: 700;
    color: var(--color-wine);
    font-size: 14px;
  }

  /* Activity feed */
  .activity-item {
    display: flex;
    gap: 12px;
    padding: 12px 0;
    border-bottom: 1px solid rgba(35, 35, 35, 0.06);
  }

  .activity-item:last-child {
    border-bottom: 0;
    padding-bottom: 0;
  }

  .activity-dot {
    flex-shrink: 0;
    width: 8px;
    height: 8px;
    margin-top: 6px;
    border-radius: 50%;
    background: var(--color-wine);
  }

  .activity-item p {
    margin: 0;
    font-size: 14px;
  }

  .activity-item time {
    color: var(--color-muted);
    font-size: 12px;
  }

  @media (max-width: 1080px) {
    .stat-grid {
      grid-template-columns: repeat(2, 1fr);
    }

    .dashboard-grid {
      grid-template-columns: 1fr;
    }
  }

  @media (max-width: 860px) {
    .app-shell {
      grid-template-columns: 1fr;
    }

    .app-sidebar {
      flex-direction: row;
      align-items: center;
      overflow-x: auto;
      border-right: 0;
      border-bottom: 1px solid rgba(35, 35, 35, 0.08);
    }

    .app-sidebar .logo {
      display: none;
    }

    .side-nav {
      grid-auto-flow: column;
    }

    .sidebar-footer {
      display: none;
    }

    .search-input {
      display: none;
    }
  }

  @media (max-width: 560px) {
    .stat-grid {
      grid-template-columns: 1fr;
    }
  }
</style>
</head>
<body>

  <div class="app-shell">

    <!-- Sidebar -->
    <aside class="app-sidebar">
      <a class="logo" href="Service.php">Rental service</a>
      <nav class="side-nav">
        <a class="active" href="#"><span class="dot"></span>Overview</a>
        <a href="Service.php"><span class="dot"></span> Store Front</a>
        <a href="second.php"><span class="dot"></span> City Cars</a>
        <a href="login.php"><span class="dot"></span> Account / Login</a>
      </nav>
      <div class="sidebar-footer">
        <div class="profile-avatar">SK</div>
        <div>
          <p class="name">Sae Kim</p>
          <p class="role">Store Owner</p>
        </div>
      </div>
    </aside>

    <!-- Main -->
    <div class="app-main">

      <header class="app-topbar">
        <div>
          <h1>Overview</h1>
          <p class="subtitle">Monday, June 29, 2026</p>
        </div>
        <div class="topbar-actions">
          <input class="search-input" type="search" placeholder="Search orders, products…" />
          <button class="icon-button" type="button">🔔</button>
          <a href="#" class="primary-link">Add product</a>
        </div>
      </header>

      <main class="dashboard-body">

        <!-- Stats -->
        <section class="stat-grid">
          <div class="stat-card">
            <div class="stat-card-head"><span>Revenue (30d)</span></div>
            <strong>$8,420</strong>
            <span class="delta delta--up">▲ 12.4% vs last month</span>
          </div>
          <div class="stat-card">
            <div class="stat-card-head"><span>Orders</span></div>
            <strong>164</strong>
            <span class="delta delta--up">▲ 6.1% vs last month</span>
          </div>
          <div class="stat-card">
            <div class="stat-card-head"><span>New Customers</span></div>
            <strong>38</strong>
            <span class="delta delta--down">▼ 2.3% vs last month</span>
          </div>
          <div class="stat-card">
            <div class="stat-card-head"><span>Avg. Order Value</span></div>
            <strong>$51.30</strong>
            <span class="delta delta--up">▲ 4.8% vs last month</span>
          </div>
        </section>

        <!-- Two column layout -->
        <div class="dashboard-grid">

          <div>
            <!-- Revenue chart -->
            <section class="panel">
              <div class="panel-head">
                <h2>Revenue This Week</h2>
                <a href="#">View report</a>
              </div>
              <div class="bar-chart">
                <div class="bar-col"><div class="bar" style="height: 55%;"></div><span>Mon</span></div>
                <div class="bar-col"><div class="bar" style="height: 70%;"></div><span>Tue</span></div>
                <div class="bar-col"><div class="bar" style="height: 40%;"></div><span>Wed</span></div>
                <div class="bar-col"><div class="bar" style="height: 85%;"></div><span>Thu</span></div>
                <div class="bar-col"><div class="bar" style="height: 65%;"></div><span>Fri</span></div>
                <div class="bar-col"><div class="bar" style="height: 95%;"></div><span>Sat</span></div>
                <div class="bar-col"><div class="bar" style="height: 30%;"></div><span>Sun</span></div>
              </div>
            </section>

            <!-- Recent orders -->
            <section class="panel">
              <div class="panel-head">
                <h2>Recent Orders</h2>
                <a href="#">View all</a>
              </div>
              <table class="data-table">
                <thead>
                  <tr>
                    <th>Order</th>
                    <th>Customer</th>
                    <th>Status</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="order-id">#10482</td>
                    <td>Lina Sok</td>
                    <td><span class="status-pill status-pill--delivered">Delivered</span></td>
                    <td>$64.00</td>
                  </tr>
                  <tr>
                    <td class="order-id">#10481</td>
                    <td>Vibol Heng</td>
                    <td><span class="status-pill status-pill--transit">In Transit</span></td>
                    <td>$112.50</td>
                  </tr>
                  <tr>
                    <td class="order-id">#10480</td>
                    <td>Sreymom Chan</td>
                    <td><span class="status-pill status-pill--pending">Pending</span></td>
                    <td>$38.00</td>
                  </tr>
                  <tr>
                    <td class="order-id">#10479</td>
                    <td>Dara Pich</td>
                    <td><span class="status-pill status-pill--delivered">Delivered</span></td>
                    <td>$76.20</td>
                  </tr>
                  <tr>
                    <td class="order-id">#10478</td>
                    <td>Channary Im</td>
                    <td><span class="status-pill status-pill--transit">In Transit</span></td>
                    <td>$54.00</td>
                  </tr>
                </tbody>
              </table>
            </section>
          </div>

          <!-- Sidebar column -->
          <aside>
            <section class="panel">
              <div class="panel-head">
                <h2>Top Products</h2>
                <a href="#">View all</a>
              </div>

              <div class="product-list-item">
                <img class="product-list-thumb" src="https://placehold.co/44x44/dfe7d8/234234?text=%20" alt="" />
                <div>
                  <p class="name">Handwoven Table Runner</p>
                  <p class="units">42 units sold</p>
                </div>
                <span class="revenue">$2,016</span>
              </div>

              <div class="product-list-item">
                <img class="product-list-thumb" src="https://placehold.co/44x44/f5ded9/a72d25?text=%20" alt="" />
                <div>
                  <p class="name">Ceramic Pour-Over Set</p>
                  <p class="units">28 units sold</p>
                </div>
                <span class="revenue">$2,128</span>
              </div>

              <div class="product-list-item">
                <img class="product-list-thumb" src="https://placehold.co/44x44/dfe7d8/234234?text=%20" alt="" />
                <div>
                  <p class="name">Linen Throw Blanket</p>
                  <p class="units">19 units sold</p>
                </div>
                <span class="revenue">$1,102</span>
              </div>
            </section>

            <section class="panel">
              <div class="panel-head">
                <h2>Recent Activity</h2>
              </div>

              <div class="activity-item">
                <span class="activity-dot"></span>
                <div>
                  <p>New order <strong>#10482</strong> placed by Lina Sok</p>
                  <time>12 minutes ago</time>
                </div>
              </div>

              <div class="activity-item">
                <span class="activity-dot"></span>
                <div>
                  <p>Low stock alert: <strong>Ceramic Mug, set of 4</strong></p>
                  <time>1 hour ago</time>
                </div>
              </div>

              <div class="activity-item">
                <span class="activity-dot"></span>
                <div>
                  <p>Vibol Heng left a 5★ review</p>
                  <time>3 hours ago</time>
                </div>
              </div>

              <div class="activity-item">
                <span class="activity-dot"></span>
                <div>
                  <p>Order <strong>#10479</strong> marked as delivered</p>
                  <time>Yesterday</time>
                </div>
              </div>
            </section>
          </aside>

        </div>

      </main>

    </div>

  </div>

</body>
</html>
