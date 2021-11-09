from pytube import YouTube

url = YouTube(str(''))
video = url.streams.get_highest_resolution()
video.download()