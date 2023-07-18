import pymysql
from config import host, user, password, db_name, API_KEY, channel
from googleapiclient.discovery import build

pl_id = ""
pl_name = ""
video_id = ""
video_name = ""
file_name = ""

def get_service():
    service = build('youtube', 'v3', developerKey=API_KEY)
    return service

# Подключение к серверу БД
try:
    connection = pymysql.connect(host=host, port=3306, user=user, password=password, database=db_name,
                                 cursorclass=pymysql.cursors.DictCursor)
    print("Успешное подключение")
except Exception as ex:
    print("Произошла ошибка:")
    print(ex)

# Создание таблицы данных.
try:
    with connection.cursor() as cursor:
        cursor.execute("CREATE TABLE playlists (id INT AUTO_INCREMENT PRIMARY KEY, playlist_name VARCHAR(63), video_id VARCHAR(63), video_name VARCHAR(63), file_name VARCHAR(63));")
        connection.commit()

except Exception as ex:
    print("Произошла ошибка:")
    print(ex)

args = {
        'part': 'snippet,contentDetails',
        'channelId': channel,
        'maxResults': 50,
    }

# Экспортирование данные о плейлистах и видео в них из ютуба в созданную базу данных с помощью API.
for _ in range(0, 1000):
    r = get_service().playlists().list(**args).execute()

    for item in r['items']:
        pl_id = item['id']
        pl_name = item['snippet']['title']
        content = item['contentDetails']['itemCount']
        print(pl_id, pl_name)

        argss = {
            'part': 'snippet',
            'playlistId': pl_id,
            'maxResults': 50
        }

        for _ in range(0, 1000):
            re = get_service().playlistItems().list(**argss).execute()
            for video in re['items']:
                if (content) > 0:
                    try:
                        video_id = video['snippet']['resourceId']['videoId']
                    except:
                        video_id = "No"
                    try:
                        video_name = video['snippet']['title']
                        file_name = video_name + ".mp4"
                    except:
                        video_name = "No"
                        file_name = video_name

                print(video_id, video_name)

                # Записывание новую строку в базе данных.
                try:
                    with connection.cursor() as cursor:
                        cursor.execute("""INSERT INTO
                                           playlists
                                           (playlist_name, video_id, video_name, file_name)
                                       VALUES
                                           (%(playlist_name)s, %(video_id)s, %(video_name)s, %(file_name)s)""",
                                       {'playlist_name': pl_name,
                                        'video_id': video_id,
                                        'video_name': video_name,
                                        'file_name': file_name})
                        connection.commit()
                except Exception as ex:
                    print("Произошла ошибка:")
                    print(ex)

            argss['pageToken'] = re.get('nextPageToken')
            if not argss['pageToken']: break

    args['pageToken'] = r.get('nextPageToken')
    if not args['pageToken']: break


connection.close()