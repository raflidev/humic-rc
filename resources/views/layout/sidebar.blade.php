    <div class="w-2/12 bg-gray-50 min-h-screen" id="sidebar">
        <div class="px-5 pb-10">
            <div class="font-semibold text-md mt-4 pb-6 uppercase">RC HUMIC</div>
            <hr>
            <div class="mt-6">
                <div class="text-sm uppercase font-semibold text-slate-500">Data RC HUMIC</div>
                <div class="space-y-3 mt-5">
                    <a href='{{ route('target.index') }}'
                        class="flex space-x-3 items-center hover:bg-slate-500 {{ Route::is('target.index') ? 'bg-slate-500 text-white' : '' }} hover:text-white rounded p-2">
                        <div class="w-5 text-center">
                            <i class="fas fa-bullseye hover:text-white text-slate-400"></i>
                        </div>
                        <div class="text-sm font-semibold uppercase">Target</div>
                    </a>
                    <a href='{{ route('research.index') }}'
                        class="flex space-x-3 items-center hover:bg-slate-500 {{ Route::is('research.index') ? 'bg-slate-500 text-white' : '' }} hover:text-white rounded p-2">
                        <div class="w-5 text-center">
                            <i class="fas fa-database hover:text-white text-slate-400"></i>
                        </div>
                        <div class="text-sm font-semibold uppercase">Penelitian</div>
                    </a>
                    <a href="{{ route('publikasi.index') }}"
                        class="flex space-x-3 {{ Route::is('publikasi.index')  ? 'bg-slate-500 text-white' : '' }} items-center hover:bg-slate-500 hover:text-white rounded p-2">
                        <div class="w-5 text-center">
                            <i class="fas fa-network-wired hover:text-white text-slate-400"></i>
                        </div>
                        <div class="text-sm font-semibold uppercase">Publikasi</div>
                    </a>
                    <a href="{{ route('hki.index') }}"
                        class="flex space-x-3 {{ Route::is('hki.index')  ? 'bg-slate-500 text-white' : '' }} items-center hover:bg-slate-500 hover:text-white rounded p-2">
                        <div class="w-5 text-center">
                            <i class="fas fa-network-wired hover:text-white text-slate-400"></i>
                        </div>
                        <div class="text-sm font-semibold uppercase">HKI</div>
                    </a>
                    <a href="{{ route('pengabdian.index') }}"
                        class="flex space-x-3 items-center hover:bg-slate-500 {{ Route::is('pengabdian.index') ? 'bg-slate-500 text-white' : '' }} hover:text-white rounded p-2">
                        <div class="w-5 text-center">
                            <i class="fas fa-people-carry hover:text-white text-slate-400"></i>
                        </div>
                        <div class="text-sm font-semibold uppercase">Pengabdian Masyarakat</div>
                    </a>
                    <a href="{{ route('kerjasama.index') }}"
                        class="flex space-x-3 items-center hover:bg-slate-500 {{ Route::is('kerjasama.index') || Route::is('kerjasama.data_ai') || Route::is('kerjasama.data_mou') || Route::is('kerjasama.data_moa') ? 'bg-slate-500 text-white' : '' }} hover:text-white rounded p-2">
                        <div class="w-5 text-center">
                            <i class="fas fa-network-wired hover:text-white text-slate-400"></i>
                        </div>
                        <div class="text-sm font-semibold uppercase">Kerja Sama</div>
                    </a>
                    <a href="{{ route('ntf') }}"
                        class="flex space-x-3 items-center hover:bg-slate-500 {{ Route::is('ntf') ? 'bg-slate-500 text-white' : '' }} hover:text-white rounded p-2">
                        <div class="w-5 text-center">
                            <i class="fas fa-dot-circle hover:text-white text-slate-400"></i>
                        </div>
                        <div class="text-sm font-semibold uppercase">Total NTF</div>
                    </a>
                </div>
            </div>
            @auth
                @if (Auth::user()->status == true)
                    <div class="mt-6">
                        <div class="text-sm uppercase font-semibold text-slate-500">
                            @if (Auth::user()->role == 'user')
                                Area User
                            @else
                                Area Superadmin
                            @endif
                        </div>
                        <div class="space-y-3 mt-5">
                            @if (Auth::user()->role == 'superadmin')
                            <a href='{{ route('user.index') }}'
                                class="flex space-x-3 {{ Route::is('user.index') ? 'bg-slate-500 text-white' : '' }} items-center hover:bg-slate-500 hover:text-white rounded p-2">
                                <div class="w-5 text-center">
                                    <i class="fas fa-user hover:text-white text-slate-400"></i>
                                </div>
                                <div class="text-sm font-semibold uppercase">User</div>
                            </a>
                            <a href='{{ route('user.index_admin') }}'
                                class="flex space-x-3 {{ Route::is('user.index_admin') ? 'bg-slate-500 text-white' : '' }} items-center hover:bg-slate-500 hover:text-white rounded p-2">
                                <div class="w-5 text-center">
                                    <i class="fas fa-user hover:text-white text-slate-400"></i>
                                </div>
                                <div class="text-sm font-semibold uppercase">Admin</div>
                            </a>
                            @endif
                            <a href="{{ route('target.index_admin') }}"
                                class="flex space-x-3 {{ Route::is('target.index_admin') ? 'bg-slate-500 text-white' : '' }} items-center hover:bg-slate-500 hover:text-white rounded p-2">
                                <div class="w-5 text-center">
                                    <i class="fas fa-bullseye hover:text-white text-slate-400"></i>
                                </div>
                                <div class="text-sm font-semibold uppercase">Input Target</div>
                            </a>
                            </a>
                            <a href="{{ route('research.create_index') }}"
                                class="flex space-x-3 {{ Route::is('research.create_index') ? 'bg-slate-500 text-white' : '' }} items-center hover:bg-slate-500 hover:text-white rounded p-2">
                                <div class="w-5 text-center">
                                    <i class="fas fa-database hover:text-white text-slate-400"></i>
                                </div>
                                <div class="text-sm font-semibold uppercase">Input Penelitian</div>
                            </a>
                            <a href="{{ route('publikasi.create_index') }}"
                                class="flex space-x-3 {{ Route::is('publikasi.create_index') ? 'bg-slate-500 text-white' : '' }} items-center hover:bg-slate-500 hover:text-white rounded p-2">
                                <div class="w-5 text-center">
                                    <i class="fas fa-database hover:text-white text-slate-400"></i>
                                </div>
                                <div class="text-sm font-semibold uppercase">Input Publikasi</div>
                            </a>
                            <a href="{{ route('hki.create_index') }}"
                                class="flex space-x-3 {{ Route::is('hki.create_index') ? 'bg-slate-500 text-white' : '' }} items-center hover:bg-slate-500 hover:text-white rounded p-2">
                                <div class="w-5 text-center">
                                    <i class="fas fa-database hover:text-white text-slate-400"></i>
                                </div>
                                <div class="text-sm font-semibold uppercase">Input HKI</div>
                            </a>
                            <a href="{{ route('pengabdian.create_index') }}"
                                class="flex space-x-3 {{ Route::is('pengabdian.create_index') || Route::is('pengabdian.create') || Route::is('pengabdian.edit') || Route::is('pengabdian.excel_import')  ? 'bg-slate-500 text-white' : '' }} items-center hover:bg-slate-500 hover:text-white rounded p-2">
                                <div class="w-5 text-center">
                                    <i class="fas fa-people-carry hover:text-white text-slate-400"></i>
                                </div>
                                <div class="text-sm font-semibold uppercase">Input Pengabdian Masyarakat</div>
                            </a>
                            <a id="collape-kerjasama" class="block flex space-x-3 justify-between items-center hover:bg-slate-500 hover:text-white rounded p-2">
                                <div class="w-5 text-center">
                                    <i class="fas fa-network-wired hover:text-white text-slate-400"></i>
                                </div>
                                <div class="text-sm font-semibold uppercase text-left w-full">Input Kerja Sama</div>
                                <div class="w-5 text-center">
                                    <i class="fas fa-chevron-down hover:text-white text-slate-400"></i>
                                </div>
                            </a>
                            <div id="kerjasama" class="bg-gray-300 p-2 rounded-md space-y-3 hidden">
                                <a href="{{ route('kerjasama.moa') }}"
                                    class="flex space-x-3 {{ Route::is('kerjasama.moa') || Route::is('kerjasama.create_moa') || Route::is('kerjasama.edit_moa') || Route::is('kerjasama.excel_import_moa') ? 'bg-slate-500 text-white' : '' }} items-center hover:bg-slate-500 hover:text-white rounded p-2">
                                    <div class="w-5 text-center">
                                        <i class="fas fa-network-wired hover:text-white text-slate-400"></i>
                                    </div>
                                    <div class="text-sm font-semibold uppercase">MOA</div>
                                </a>
                                <a href="{{ route('kerjasama.mou') }}"
                                    class="flex space-x-3 {{ Route::is('kerjasama.mou') || Route::is('kerjasama.create_mou') || Route::is('kerjasama.edit_mou') || Route::is('kerjasama.excel_import_mou') ? 'bg-slate-500 text-white' : '' }} items-center hover:bg-slate-500 hover:text-white rounded p-2">
                                    <div class="w-5 text-center">
                                        <i class="fas fa-network-wired hover:text-white text-slate-400"></i>
                                    </div>
                                    <div class="text-sm font-semibold uppercase">MOU</div>
                                </a>
                                <a href="{{ route('kerjasama.ai') }}"
                                    class="flex space-x-3 {{ Route::is('kerjasama.ai') || Route::is('kerjasama.create_ai') || Route::is('kerjasama.edit_ai') || Route::is('kerjasama.excel_import_ai') ? 'bg-slate-500 text-white' : '' }} items-center hover:bg-slate-500 hover:text-white rounded p-2">
                                    <div class="w-5 text-center">
                                        <i class="fas fa-network-wired hover:text-white text-slate-400"></i>
                                    </div>
                                    <div class="text-sm font-semibold uppercase">IA</div>
                                </a>
                            </div>
                            @if (Auth::user()->role == 'superadmin')
                            <a href="{{ route('ntf.index') }}"
                                class="flex space-x-3 {{ Route::is('ntf.index') || Route::is('ntf.create') || Route::is('ntf.edit') ? 'bg-slate-500 text-white' : '' }} items-center hover:bg-slate-500 hover:text-white rounded p-2">
                                <div class="w-5 text-center">
                                    <i class="fas fa-network-wired hover:text-white text-slate-400"></i>
                                </div>
                                <div class="text-sm font-semibold uppercase">Input NTF</div>
                            </a>
                            @endif
                            <a href='{{route('user.profile')}}'
                                class="flex space-x-3 items-center {{ Route::is('user.profile') ? 'bg-slate-500 text-white' : '' }} hover:bg-slate-500 hover:text-white rounded p-2">
                                <div class="w-5 text-center">
                                    <i class="fas fa-user hover:text-white text-slate-400"></i>
                                </div>
                                <div class="text-sm font-semibold uppercase">Profile</div>
                            </a>
                        </div>
                    </div>
                @endif
            @endauth
        </div>
    </div>
<script>
    document.getElementById('collape-kerjasama').addEventListener('click', function() {
        document.getElementById('kerjasama').classList.toggle('hidden');
    });

</script>
