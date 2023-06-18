    <!--start header wrapper-->
    <div class="header-wrapper">
        <header>
            <div class="topbar d-flex align-items-center">
                <nav class="navbar navbar-expand">
                    <div class="topbar-logo-header">
                        <div class="">
                            <img src="assets/images/logi-icon.png" class="logo-icon" alt="logo icon">
                        </div>
                        <div class="">
                            <h4 class="logo-text">KLEOS</h4>
                        </div>
                    </div>
                    <div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>
                    
                    <div class="top-menu ms-auto">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item mobile-search-icon">
                                <a class="nav-link" href="#">	<i class='bx bx-search'></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown dropdown-large">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">	<i class='bx bx-category'></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="row row-cols-3 g-3 p-3">
                                        <div class="col text-center">
                                            <div class="app-box mx-auto bg-gradient-cosmic text-white">
                                                <a class="nav-link" href="list-AppDevice"><i class='bx bx-devices'></i></a>
                                            </div>
                                            <div class="app-title">Devices</div>
                                        </div>
                                        <div class="col text-center">
                                            <div class="app-box mx-auto bg-gradient-burning text-white">
                                                <a class="nav-link" href="list-gateway"><i class='bx bx-log-in'></i></a>
                                            </div>
                                            <div class="app-title">Gateways</div>
                                        </div>
                                        <div class="col text-center">
                                            <div class="app-box mx-auto bg-gradient-lush text-white">
                                                <a class="nav-link" href="list-site"><i class='bx bx-trip'></i></a>
                                            </div>
                                            <div class="app-title">Sites</div>
                                        </div>
                                        <div class="col text-center">
                                            <div class="app-box mx-auto bg-gradient-kyoto text-dark">
                                                <a class="nav-link" href="list-scenarios"><i class='bx bx-edit'></i></a>
                                            </div>
                                            <div class="app-title">Scenarios</div>
                                        </div>                                        
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-large">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span id="notification-count" class="alert-count"></span>
                                    <i class='bx bx-bell'></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:;">
                                        <div class="msg-header">
                                            <p class="msg-header-title">Notifications</p>
                                            <p class="msg-header-clear ms-auto">
                                                <a href="#" class="msg-header-clear ms-auto" id="markAllAsRead">Marks all as read</a>
                                            </p>

                                            <form id="markAllForm" action="/mark-all-as-read" method="POST" style="display: none;">
                                                @csrf
                                                @method('POST')
                                            </form>
                                        </div>
                                    </a>
                                    <div class="header-notifications-list" id="notification-list" style="max-height: 700px; overflow-y: auto;">
                                        <!-- Notification items will be dynamically added here -->
                                    </div>
                                    <a href="javascript:;">
                                        <div class="text-center msg-footer" ><a href="#" class="text-center msg-footer" id="viewAllLink">View All Notifications</a></div>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-large d-none">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>
                                    <i class='bx bx-comment'></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:;">
                                        <div class="msg-header">
                                            <p class="msg-header-title">Messages</p>
                                            <p class="msg-header-clear ms-auto">Marks all as read</p>
                                        </div>
                                    </a>
                                    <div class="header-message-list">
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="assets/images/avatars/avatar-1.png')  }}" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Daisy Anderson <span class="msg-time float-end">5 sec
												ago</span></h6>
                                                    <p class="msg-info">The standard chunk of lorem</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="assets/images/avatars/avatar-2.png')  }}" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Althea Cabardo <span class="msg-time float-end">14
												sec ago</span></h6>
                                                    <p class="msg-info">Many desktop publishing packages</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="assets/images/avatars/avatar-3.png')  }}" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Oscar Garner <span class="msg-time float-end">8 min
												ago</span></h6>
                                                    <p class="msg-info">Various versions have evolved over</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="assets/images/avatars/avatar-4.png')  }}" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Katherine Pechon <span class="msg-time float-end">15
												min ago</span></h6>
                                                    <p class="msg-info">Making this the first true generator</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="assets/images/avatars/avatar-5.png')  }}" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Amelia Doe <span class="msg-time float-end">22 min
												ago</span></h6>
                                                    <p class="msg-info">Duis aute irure dolor in reprehenderit</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="assets/images/avatars/avatar-6.png')  }}" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Cristina Jhons <span class="msg-time float-end">2 hrs
												ago</span></h6>
                                                    <p class="msg-info">The passage is attributed to an unknown</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="assets/images/avatars/avatar-7.png')  }}" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">James Caviness <span class="msg-time float-end">4 hrs
												ago</span></h6>
                                                    <p class="msg-info">The point of using Lorem</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="assets/images/avatars/avatar-8.png')  }}" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Peter Costanzo <span class="msg-time float-end">6 hrs
												ago</span></h6>
                                                    <p class="msg-info">It was popularised in the 1960s</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="assets/images/avatars/avatar-9.png')  }}" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">David Buckley <span class="msg-time float-end">2 hrs
												ago</span></h6>
                                                    <p class="msg-info">Various versions have evolved over</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="assets/images/avatars/avatar-10.png')  }}" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Thomas Wheeler <span class="msg-time float-end">2 days
												ago</span></h6>
                                                    <p class="msg-info">If you are going to use a passage</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="assets/images/avatars/avatar-11.png')  }}" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Johnny Seitz <span class="msg-time float-end">5 days
												ago</span></h6>
                                                    <p class="msg-info">All the Lorem Ipsum generators</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <a href="javascript:;">
                                        <div class="text-center msg-footer">View All Messages</div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="user-box dropdown">
                        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (auth()->user()->image !== null)
                            <img src="{{ asset('storage/' . auth()->user()->image) }}" class="user-img" alt="user avatar">
                        @else
                            <img src="assets/images/user.png" class="user-img" alt="Default Avatar">
                        @endif

                            <div class="user-info ps-3">
                                <p class="user-name mb-0">{{ Auth::user()->name }}</p>
                                <p class="designattion mb-0">{{ Auth::user()->role }}</p>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="profile-user"><i class="bx bx-user"></i><span>Profile</span></a></li>
                            <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Settings</span></a></li>
                            <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-home-circle'></i><span>Dashboard</span></a></li>
                            <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-dollar-circle'></i><span>Earnings</span></a></li>
                            <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-download'></i><span>Downloads</span></a></li>
                            <li><div class="dropdown-divider mb-0"></div></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"><i class='bx bx-log-out-circle'></i><span>Logout</span></a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
    </div>
    <!-- Page wrapper end -->
    <script>
        function checkNotifications() {
            // Make a request to the API to get all notification data
            fetch('/notifications')
                .then(response => response.json())
                .then(data => {
                    // Update the notification list with the received data
                    updateNotification(data);
                })
                .catch(error => console.error(error));
        }

        function getAvatarImage(notification) {
            if (notification.title.toLowerCase().includes('high water')) {
                return 'assets/images/high-tide.png';
            } else if (notification.title.toLowerCase().includes('low water')) {
                return 'assets/images/water-level.png';
            } else if (notification.title.toLowerCase().includes('elevated temperature')) {
                return 'assets/images/thermometer (1).png';
            } else if (notification.title.toLowerCase().includes('high temperature')) {
                return 'assets/images/thermometer (1).png';
            } else if (notification.title.toLowerCase().includes('low temperature')) {
                return 'assets/images/thermometer (2).png';
            } else {
                return 'assets/images/Attention-sign-icon.png'; // Default image
            }
        }

        function updateNotification(data) {
            // Extract data from the response
            const notifications = data.notifications;

            // Update the notification list in the HTML
            const notificationList = document.getElementById('notification-list');
            notificationList.innerHTML = ''; // Clear the existing list

            // Reverse the notifications array to display the latest at the top
            const reversedNotifications = notifications.reverse();

            for (const notification of reversedNotifications) {
                const listItem = document.createElement('a');
                listItem.classList.add('dropdown-item');
                if (notification.read_at === null) {
                    listItem.classList.add('unread-notification');
                }
                listItem.href = `/notifications/${notification.id}`;

                const avatarImageSrc = getAvatarImage(notification);

                let itemContent = `
                    <div class="d-flex align-items-center">
                        <div class="user-online">
                            <img src="${avatarImageSrc}" class="msg-avatar" alt="user avatar">
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="msg-name">${notification.title}<span class="msg-time float-end${notification.read_at === null ? ' text-primary' : ''}">${timeSince(new Date(notification.created_at))}</span></h6>
                        </div>
                    </div>
                `;

                listItem.innerHTML = itemContent;
                // Add a click event listener to mark the notification as read when clicked
                listItem.addEventListener('click', function () {
                    fetch(`/notifications/${notification.id}/read`, { method: 'PUT' })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Failed to mark notification as read');
                            }
                            // Remove the 'unread-notification' class to mark the notification as read
                            listItem.classList.remove('unread-notification');
                        })
                        .catch(error => console.error(error));
                });
                // Add the list item to the notification list
                notificationList.appendChild(listItem);
            }
        }

        function timeSince(date) {
            const seconds = Math.floor((new Date() - date) / 1000);
            const intervals = {
                year: 31536000,
                month: 2592000,
                day: 86400,
                hour: 3600,
                minute: 60,
                second: 1
            };

            for (const [intervalName, intervalSeconds] of Object.entries(intervals)) {
                const intervalCount = Math.floor(seconds / intervalSeconds);
                if (intervalCount >= 1) {
                    return intervalCount + " " + intervalName + (intervalCount > 1 ? "s" : "") + " ago";
                }
            }

            return "just now";
        }

        function updateNotificationCount(count) {
            const notificationCountElement = document.getElementById('notification-count');
            if (notificationCountElement) {
                notificationCountElement.textContent = count.toString();
            }
        }

        function fetchNotifications() {
            fetch('/notifications')
                .then(response => response.json())
                .then(data => {
                    updateNotification(data);
                    updateNotificationCount(data.unread_count);
                })
                .catch(error => console.error(error));
        }
        
        setInterval(fetchNotifications, 1000);
        
            const markAllAsReadLink = document.getElementById('markAllAsRead');
        markAllAsReadLink.addEventListener('click', function (event) {
            event.preventDefault();
            markAllNotificationsAsRead();
        });

        function markAllNotificationsAsRead() {
            const markAllForm = document.getElementById('markAllForm');
            markAllForm.submit();
        }

        const viewAllLink = document.getElementById('viewAllLink');
        viewAllLink.addEventListener('click', function () {
            viewAllNotifications();
        });

        // Function to handle "View All Notifications" click event
        function viewAllNotifications() {
            // Redirect the user to the desired route or blade
            window.location.href = '/view-all-notifications';
        }

    </script>
    
