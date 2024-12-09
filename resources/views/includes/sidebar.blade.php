 <div class="sidebar border-end">
     <ul class="nav flex-column">
         <li class="nav-item">
             <a class="nav-link {{ Route::is('products.index') ? 'bg-primary rounded-sm text-white' : '' }}"
                 href={{ route('products.index') }}>List Product</a>
         </li>
         <li class="nav-item ">
             <a class="nav-link {{ Route::is('products.values') ? 'bg-primary rounded-sm text-white' : '' }}"
                 href={{ route('products.values') }}>Product Values</a>
         </li>
         <li class="nav-item">
             <a class="nav-link {{ Route::is('categories.index') ? 'bg-primary rounded-sm text-white' : '' }}"
                 href={{ route('categories.index') }}>Categories</a>
         </li>
         <li class="nav-item">
             <a class="nav-link {{ Route::is('check-percentage.index') || Route::is('check-percentage') ? 'bg-primary rounded-sm text-white' : '' }}"
                 href={{ route('check-percentage.index') }}>Check Percentage</a>
         </li>
         <li class="nav-item">
             <button type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModalLogout">
                 Logout
             </button>
         </li>
     </ul>
 </div>

 <!-- Modal -->
 <div class="modal fade" id="exampleModalLogout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Logout</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 Apakah anda yakin akan logout?
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>

                 <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                     @csrf
                     <button type="submit" class="btn btn-danger">Ya</button>
                 </form>

             </div>
         </div>
     </div>
 </div>
