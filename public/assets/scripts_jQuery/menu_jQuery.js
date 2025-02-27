$(document).ready(function() {
    const $mainMenu = $('#main_menu');
    const mainMenuItems = $mainMenu.find('li');
    console.log(mainMenuItems);
    const menuImages = {
        '/laba8/LABA8/main/index': ['/laba8/LABA8/public/assets/imgs/icons_for_menu1/mainPage.svg', '/laba8/LABA8/public/assets/imgs/icons_for_menu2/mainPage2.svg', 'Главная страница'],
        '/laba8/LABA8/main/actionAboutMe': ['/laba8/LABA8/public/assets/imgs/icons_for_menu1/aboutMe.svg', '/laba8/LABA8/public/assets/imgs/icons_for_menu2/aboutMe2.svg', 'Обо мне'],
        '/laba8/LABA8/main/actionMyHobbies': ['/laba8/LABA8/public/assets/imgs/icons_for_menu1/myHobbies.svg', '/laba8/LABA8/public/assets/imgs/icons_for_menu2/myHobbies2.svg', 'Мои интересы'],
        '/laba8/LABA8/main/actionStudy': ['/laba8/LABA8/public/assets/imgs/icons_for_menu1/study.svg', '/laba8/LABA8/public/assets/imgs/icons_for_menu2/study2.svg', 'Учеба'],
        '/laba8/LABA8/main/actionPhotoAlbum': ['/laba8/LABA8/public/assets/imgs/icons_for_menu1/photoAlbum.svg', '/laba8/LABA8/public/assets/imgs/icons_for_menu2/photoAlbum2.svg', 'Фотоальбом'],
        '/laba8/LABA8/main/actionContact': ['/laba8/LABA8/public/assets/imgs/icons_for_menu1/contact.svg', '/laba8/LABA8/public/assets/imgs/icons_for_menu2/contact2.svg', 'Контакты'],
        '/laba8/LABA8/main/actionDisciplineTest': ['/laba8/LABA8/public/assets/imgs/icons_for_menu1/disciplineTest.svg', '/laba8/LABA8/public/assets/imgs/icons_for_menu2/disciplineTest2.svg', 'Тест по дисциплине'],
        '/laba8/LABA8/main/actionHistory': ['/laba8/LABA8/public/assets/imgs/icons_for_menu1/history.svg', '/laba8/LABA8/public/assets/imgs/icons_for_menu2/history2.svg', 'История просмотра']
    };
    

    // Определяем текущую страницу
    const currPage = $(window.location).attr('pathname').split('/').pop();
    console.log(currPage);

    mainMenuItems.each(function() {
        const item = $(this);
        console.log(item);
        const link = item.find('a');
        const href = link.attr('href');
        console.log(href);

        if (menuImages[href]) {
            const img = $('<img>', {
                class: 'main_menu-image',
                src: menuImages[href][0],
                css: {
                    marginLeft: '10px'
                }
            });
            link.append(img);

            const text = $('<div>', {
                class: 'menu_content-text',
                css: {
                    top: '26px',
                    fontSize: '12px'
                }
            }).text(menuImages[href][2]);
            link.append(text);
        }

        if (currPage === href) {
            const img = item.find('.main_menu-image');
            img.attr('src', menuImages[href][1]);

            const text = item.find('.menu_content-text');
            text.css({
                color: '#1a73e8'
            });
        } else {
            item.on('mouseenter', function() {
                const img = $(this).find('.main_menu-image');
                img.attr('src', menuImages[href][1]);

                const text = $(this).find('.menu_content-text');
                text.css({
                    color: '#1a73e8'
                });
            });

            item.on('mouseleave', function() {
                const img = $(this).find('.main_menu-image');
                img.attr('src', menuImages[href][0]);

                const text = $(this).find('.menu_content-text');
                text.css({
                    color: '#000000'
                });
            });
        }
    });

    const $hobbiesMenu = $('a[href="/laba8/LABA8/main/actionMyHobbies"]').parent();
    const $submenu = $('<ul>', {
        class: 'submenu'
    });

    // Добавляем подпункты
    const subItems = [
        { text: 'Хобби', href: '/laba8/LABA8/main/actionMyHobbies#hobby' },
        { text: 'Фильмы', href: '/laba8/LABA8/main/actionMyHobbies#films' },
        { text: 'Музыка', href: '/laba8/LABA8/main/actionMyHobbies#music' },
        { text: 'Книги', href: '/laba8/LABA8/main/actionMyHobbies#books' }
    ];

    subItems.forEach(function(item) {
        const $li = $('<li>');
        const $a = $('<a>', {
            href: item.href
        }).text(item.text);
        $li.append($a);
        $submenu.append($li);
    });

    $hobbiesMenu.append($submenu);
    $submenu.hide();

    $hobbiesMenu.on('mouseenter', function() {
        $submenu.show();
    });

    $hobbiesMenu.on('mouseleave', function() {
        $submenu.hide();
    });
});