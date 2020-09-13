 <!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
        -->
        <aside class="left-sidebar bg-sidebar">
          <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand">
              <a href="/admin/dashboard">
                <span class="brand-name">Simply Accounting</span>
              </a>
            </div>
            <!-- begin sidebar scrollbar -->
            <div class="sidebar-scrollbar">

              <!-- sidebar menu -->
              <ul class="nav sidebar-inner" id="sidebar-menu">
                

                
                  <li  class="has-sub expand {{ Request::is('admin/dashboard')?'active':''}}" >
                    <a class="sidenav-item-link" href="/admin/dashboard">
                      <i class="mdi mdi-view-dashboard-outline"></i>
                      <span class="nav-text">Dashboard</span>
                    </a>
                    <ul  class="collapse show"  id="dashboard"
                      data-parent="#sidebar-menu">
                    </ul>
                  </li>
                

                
                @if (auth()->user()->username == 'akuntansi')
                
                  <li  class="has-sub {{ Request::is('admin/account','admin/accountJenis','admin/accountType','admin/assetGroup','admin/assetType','admin/tax')?'active':''}}" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#ui-elements"
                      aria-expanded="false" aria-controls="ui-elements">
                      <i class="mdi mdi-folder-multiple-outline"></i>
                      <span class="nav-text">Data Master</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="ui-elements"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        
                        
                        <li  class="has-sub {{ Request::is('admin/account','admin/accountJenis','admin/accountType')?'active':''}}" >
                          <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#components"
                            aria-expanded="false" aria-controls="components">
                            <span class="nav-text">Akun</span> <b class="caret"></b>
                          </a>
                          <ul  class="collapse"  id="components">
                            <div class="sub-menu">
                              
                              <li class="{{ Request::is('admin/account')?'active':''}}">
                                <a href="/admin/account">Akun</a>
                              </li>
                              
                              <li class="{{ Request::is('admin/accountJenis')?'active':''}}">
                                <a href="/admin/accountJenis">Jenis Akun</a>
                              </li>
                              
                              <li class="{{ Request::is('admin/accountType')?'active':''}}">
                                <a href="/admin/accountType">Tipe Akun</a>
                              </li>
                              
                            </div>
                          </ul>
                        </li>
                        

                        
                        
                        <li  class="has-sub {{ Request::is('admin/assetGroup','admin/assetType')?'active':''}}" >
                          <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#icons"
                            aria-expanded="false" aria-controls="icons">
                            <span class="nav-text">Harta</span> <b class="caret"></b>
                          </a>
                          <ul  class="collapse"  id="icons">
                            <div class="sub-menu">
                              
                              <li class="{{ Request::is('admin/assetGroup')?'active':''}}">
                                <a href="/admin/assetGroup">Jenis Harta</a>
                              </li>
                              
                              <li class="{{ Request::is('admin/assetType')?'active':''}}">
                                <a href="/admin/assetType">Tipe Harta</a>
                              </li>
                              
                            </div>
                          </ul>
                        </li>
                        

                        
                        
                        <li  class="has-sub {{ Request::is('admin/tax')?'active':''}}" >
                          <a class="sidenav-item-link" href="/admin/tax">
                            <span class="nav-text">Pajak</span>
                          </a>
                        </li>
                      



                      </div>
                    </ul>
                  </li>
                
                  
                @endif
                
                
                @if (auth()->user()->username == 'akuntansi' || auth()->user()->username == 'keuangan')

                  <li class="{{ Request::is('admin/transactions')?'active':''}}">
                    <a class="sidenav-item-link" href="/admin/transactions">
                      <i class="fa fa-dollar"></i>
                      <span class="nav-text">Transaksi</span>
                    </a>
                  </li>
                
                @endif

                
                @if (auth()->user()->username == 'akuntansi')
                
                  <li class="has-sub {{ Request::is('admin/expenseCash','admin/incomeCash')?'active':''}}" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#charts"
                      aria-expanded="false" aria-controls="charts">
                      <i class="mdi mdi-bank"></i>
                      <span class="nav-text">Kas & Bank</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="charts"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        
                        
                          
                            <li class="{{ Request::is('admin/expenseCash')?'active':''}}">
                              <a class="sidenav-item-link" href="/admin/expenseCash">
                                <span class="nav-text">Kas Keluar</span>
                              </a>
                            </li>

                            <li class="{{ Request::is('admin/incomeCash')?'active':''}}">
                              <a class="sidenav-item-link" href="/admin/incomeCash">
                                <span class="nav-text">Kas Masuk</span>
                              </a>
                            </li>
                          
                        

                        
                      </div>
                    </ul>
                  </li>
                

                

                
                  <li  class="has-sub {{ Request::is('admin/ledger','admin/journal')?'active':''}}" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#pages"
                      aria-expanded="false" aria-controls="pages">
                      <i class="mdi mdi-cash-multiple"></i>
                      <span class="nav-text">Akuntansi</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="pages"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                      

                            <li class="{{ Request::is('admin/ledger')?'active':''}}">
                              <a class="sidenav-item-link" href="/admin/ledger">
                                <span class="nav-text">Buku Besar</span>
                              </a>
                            </li>

                            <li class="{{ Request::is('admin/journal')?'active':''}}">
                              <a class="sidenav-item-link" href="/admin/journal">
                                <span class="nav-text">Jurnal Umum</span>
                              </a>
                            </li>

                            {{-- <li >
                              <a class="sidenav-item-link" href="#">
                                <span class="nav-text">Close the Ledger</span>
                              </a>
                            </li> --}}

                      </div>
                    </ul>
                  </li>
                
                @endif
                

                @if (auth()->user()->username == 'akuntansi' || auth()->user()->username == 'direksi')
                
                  <li  class="has-sub {{ Request::is('admin/laporanArusKas','admin/laporanLabaRugi','admin/laporanNeraca')?'active':''}}" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#documentation"
                      aria-expanded="false" aria-controls="documentation">
                      <i class="mdi mdi-book-open-page-variant"></i>
                      <span class="nav-text">Laporan</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="documentation"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        
                            <li class="{{ Request::is('admin/laporanArusKas')?'active':''}}">
                              <a class="sidenav-item-link" href="/admin/laporanArusKas">
                                <span class="nav-text">Arus Kas</span>
                              </a>
                            </li>
                          
                            <li class="{{ Request::is('admin/laporanLabaRugi')?'active':''}}">
                              <a class="sidenav-item-link" href="/admin/laporanLabaRugi">
                                <span class="nav-text">Laba Rugi</span>
                              </a>
                            </li>
                          
                            <li class="{{ Request::is('admin/laporanNeraca')?'active':''}}">
                              <a class="sidenav-item-link" href="/admin/laporanNeraca">
                                <span class="nav-text">Neraca</span>
                              </a>
                            </li>
  
                      </div>
                    </ul>
                  </li>
                
                @endif
                
              </ul>

            </div>

            <hr class="separator" />

            {{--
            <div class="sidebar-footer">
              <div class="sidebar-footer-content">
                <h6 class="text-uppercase">
                  Cpu Uses <span class="float-right">40%</span>
                </h6>
                <div class="progress progress-xs">
                  <div
                    class="progress-bar active"
                    style="width: 40%;"
                    role="progressbar"
                  ></div>
                </div>
                <h6 class="text-uppercase">
                  Memory Uses <span class="float-right">65%</span>
                </h6>
                <div class="progress progress-xs">
                  <div
                    class="progress-bar progress-bar-warning"
                    style="width: 65%;"
                    role="progressbar"
                  ></div>
                </div>
              </div>
            </div>
            --}}

          </div>
        </aside>