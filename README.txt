Запуск:
    Импортировать qa_blog.sql
    Прописать настройки подключения к бд в:
    application/configs/db.php


API:

Включенный mod_rewrite
    /articles/

    1. save POST[article]  {"title": Название статьи,
                              "slogan": Второе название,
                              "text": Весь текст статьи,
                              "author": Автор,
                              }
        Сохраняет сущность.
        Возвращает {"succes":true}, если удачно, либо false.
    2. update POST[article]  {"id": идентификатор статьи
                                  "title": Название статьи,
                                  "slogan": Второе название,
                                  "text": Весь текст статьи,
                                  "author": Автор,
                                  }
        Обновляет сущность если такая есть в бд.
        Возвращает {"succes":true}, если удачно, либо false.
    3. delete/{id} DELETE Удаляет сущность по идентификатору
    4. find/{id} GET Получает сущность по идентификатору
    5. findAll/ GET Получает список сущностей
    6. findPerPage/{page_number} GET Выводит список сущностей с постраничной разбивкой



Выключенный mod_rewrite
    /json.php?case=article

    1. &act=save POST[article]  {"title": Название статьи,
                              "slogan": Второе название,
                              "text": Весь текст статьи,
                              "author": Автор,
                              }
        Сохраняет сущность.
        Возвращает {"succes":true}, если удачно, либо false.
    2. &act=update POST[article]  {"id": идентификатор статьи
                                      "title": Название статьи,
                                      "slogan": Второе название,
                                      "text": Весь текст статьи,
                                      "author": Автор,
                                      }
            Обновляет сущность если такая есть в бд.
            Возвращает {"succes":true}, если удачно, либо false.
    3. &act=delete&id={id} DELETE Удаляет сущность по идентификатору
    4. &act=find&id={id} GET Получает сущность по идентификатору
    5. &act=findAll GET Получает список сущностей
    6. &act=findPerPage&id={page_number} GET Выводит список сущностей с постраничной разбивкой

