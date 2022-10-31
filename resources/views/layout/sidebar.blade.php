    <div class="w-2/12 bg-gray-50" id="sidebar">
        <div class="px-5">
            <div class="font-semibold text-md mt-4 pb-6 uppercase">RC HUMIC</div>
            <hr>
            <div class="mt-6">
                <div class="text-sm uppercase font-semibold text-slate-500">Data RC HUMIC</div>
                <div class="space-y-3 mt-5">
                    <a href='/' class="flex space-x-3 items-center hover:bg-slate-500 hover:text-white rounded p-2">
                        <div class="w-5 text-center">
                            <i class="fas fa-database hover:text-white text-slate-400"></i>
                        </div>
                        <div class="text-sm font-semibold uppercase">Penelitian</div>
                    </a>
                    <a href="/pengabdian"
                        class="flex space-x-3 items-center hover:bg-slate-500 hover:text-white rounded p-2">
                        <div class="w-5 text-center">
                            <i class="fas fa-people-carry hover:text-white text-slate-400"></i>
                        </div>
                        <div class="text-sm font-semibold uppercase">Pengabdian Masyarakat</div>
                    </a>
                    <a href="/kerjasama"
                        class="flex space-x-3 items-center hover:bg-slate-500 hover:text-white rounded p-2">
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
                    <div class="mt-6">
                        <div class="text-sm uppercase font-semibold text-slate-500">Area Admin</div>
                        <div class="space-y-3 mt-5">
                            <a href='/user/input'
                                class="flex space-x-3 items-center hover:bg-slate-500 hover:text-white rounded p-2">
                                <div class="w-5 text-center">
                                    <i class="fas fa-user hover:text-white text-slate-400"></i>
                                </div>
                                <div class="text-sm font-semibold uppercase">User</div>
                            </a>
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
                            <a href="/ntf/input"
                                class="flex space-x-3 items-center hover:bg-slate-500 hover:text-white rounded p-2">
                                <div class="w-5 text-center">
                                    <i class="fas fa-dot-circle hover:text-white text-slate-400"></i>
                                </div>
                                <div class="text-sm font-semibold uppercase">Total NTF</div>
                            </a>
                        </div>
                    </div>
                @endif
            @endauth
        </div>
    </div>
