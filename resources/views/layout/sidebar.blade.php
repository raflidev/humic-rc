    <div class="w-2/12 bg-gray-50" id="sidebar">
        <div class="px-5">
            <div class="font-semibold text-md mt-4 pb-6 uppercase">RC HUMIC</div>
            <hr>
            <div class="mt-6">
                <div class="text-sm uppercase font-semibold text-slate-500">Data RC HUMIC</div>
                <div class="space-y-3 mt-5">
                    <a href='{{ route('research.index') }}'
                        class="flex space-x-3 items-center hover:bg-slate-500 {{ Route::is('research.index') ? 'bg-slate-500 text-white' : '' }} hover:text-white rounded p-2">
                        <div class="w-5 text-center">
                            <i class="fas fa-database hover:text-white text-slate-400"></i>
                        </div>
                        <div class="text-sm font-semibold uppercase">Penelitian</div>
                    </a>
                    <a href="{{ route('pengabdian.index') }}"
                        class="flex space-x-3 items-center hover:bg-slate-500 {{ Route::is('pengabdian.index') ? 'bg-slate-500 text-white' : '' }} hover:text-white rounded p-2">
                        <div class="w-5 text-center">
                            <i class="fas fa-people-carry hover:text-white text-slate-400"></i>
                        </div>
                        <div class="text-sm font-semibold uppercase">Pengabdian Masyarakat</div>
                    </a>
                    <a href="{{ route('kerjasama.index') }}"
                        class="flex space-x-3 items-center hover:bg-slate-500 {{ Route::is('kerjasama.index') ? 'bg-slate-500 text-white' : '' }} hover:text-white rounded p-2">
                        <div class="w-5 text-center">
                            <i class="fas fa-network-wired hover:text-white text-slate-400"></i>
                        </div>
                        <div class="text-sm font-semibold uppercase">Kerja Sama</div>
                    </a>
                    <a href="/ntf"
                        class="flex space-x-3 items-center hover:bg-slate-500 hover:text-white rounded p-2">
                        <div class="w-5 text-center">
                            <i class="fas fa-dot-circle hover:text-white text-slate-400"></i>
                        </div>
                        <div class="text-sm font-semibold uppercase">Total NTF</div>
                    </a>
                </div>
            </div>
            @auth
                @if (Auth::user()->status == true)
                    @if (Auth::user()->role == 'superadmin')
                        <div class="mt-6">
                            <div class="text-sm uppercase font-semibold text-slate-500">Area Superadmin</div>
                            <div class="space-y-3 mt-5">
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
                                <a href="{{ route('research.create_index') }}"
                                    class="flex space-x-3 {{ Route::is('research.create_index') ? 'bg-slate-500 text-white' : '' }} items-center hover:bg-slate-500 hover:text-white rounded p-2">
                                    <div class="w-5 text-center">
                                        <i class="fas fa-database hover:text-white text-slate-400"></i>
                                    </div>
                                    <div class="text-sm font-semibold uppercase">Input Penelitian</div>
                                </a>
                                <a href="{{ route('pengabdian.create_index') }}"
                                    class="flex space-x-3 {{ Route::is('pengabdian.create_index') ? 'bg-slate-500 text-white' : '' }} items-center hover:bg-slate-500 hover:text-white rounded p-2">
                                    <div class="w-5 text-center">
                                        <i class="fas fa-people-carry hover:text-white text-slate-400"></i>
                                    </div>
                                    <div class="text-sm font-semibold uppercase">Input Pengabdian Masyarakat</div>
                                </a>
                                <a href="{{ route('kerjasama.moa') }}"
                                    class="flex space-x-3 {{ Route::is('kerjasama.moa') ? 'bg-slate-500 text-white' : '' }} items-center hover:bg-slate-500 hover:text-white rounded p-2">
                                    <div class="w-5 text-center">
                                        <i class="fas fa-network-wired hover:text-white text-slate-400"></i>
                                    </div>
                                    <div class="text-sm font-semibold uppercase">Input Kerja Sama - MOA</div>
                                </a>
                                <a href="{{ route('kerjasama.mou') }}"
                                    class="flex space-x-3 {{ Route::is('kerjasama.mou') ? 'bg-slate-500 text-white' : '' }} items-center hover:bg-slate-500 hover:text-white rounded p-2">
                                    <div class="w-5 text-center">
                                        <i class="fas fa-network-wired hover:text-white text-slate-400"></i>
                                    </div>
                                    <div class="text-sm font-semibold uppercase">Input Kerja Sama - MOU</div>
                                </a>
                                <a href="{{ route('kerjasama.ai') }}"
                                    class="flex space-x-3 {{ Route::is('kerjasama.ai') ? 'bg-slate-500 text-white' : '' }} items-center hover:bg-slate-500 hover:text-white rounded p-2">
                                    <div class="w-5 text-center">
                                        <i class="fas fa-network-wired hover:text-white text-slate-400"></i>
                                    </div>
                                    <div class="text-sm font-semibold uppercase">Input Kerja Sama - AI</div>
                                </a>
                            </div>
                        </div>
                    @endif
                    @if (Auth::user()->role == 'user')
                        <div class="mt-6">
                            <div class="text-sm uppercase font-semibold text-slate-500">Area User</div>
                            <div class="space-y-3 mt-5">
                                <a href="/penelitian/input"
                                    class="flex space-x-3 items-center hover:bg-slate-500 hover:text-white rounded p-2">
                                    <div class="w-5 text-center">
                                        <i class="fas fa-database hover:text-white text-slate-400"></i>
                                    </div>
                                    <div class="text-sm font-semibold uppercase">Input Penelitian</div>
                                </a>
                                <a href="/pengabdian/input"
                                    class="flex space-x-3 items-center hover:bg-slate-500 hover:text-white rounded p-2">
                                    <div class="w-5 text-center">
                                        <i class="fas fa-people-carry hover:text-white text-slate-400"></i>
                                    </div>
                                    <div class="text-sm font-semibold uppercase">Input Pengabdian Masyarakat</div>
                                </a>
                                <a href="/kerjasama/input"
                                    class="flex space-x-3 items-center hover:bg-slate-500 hover:text-white rounded p-2">
                                    <div class="w-5 text-center">
                                        <i class="fas fa-network-wired hover:text-white text-slate-400"></i>
                                    </div>
                                    <div class="text-sm font-semibold uppercase">Input Kerja Sama</div>
                                </a>
                                <a href='/user/input'
                                    class="flex space-x-3 items-center hover:bg-slate-500 hover:text-white rounded p-2">
                                    <div class="w-5 text-center">
                                        <i class="fas fa-user hover:text-white text-slate-400"></i>
                                    </div>
                                    <div class="text-sm font-semibold uppercase">Profile</div>
                                </a>
                            </div>
                        </div>
                    @endif
                @endif
            @endauth
        </div>
    </div>
