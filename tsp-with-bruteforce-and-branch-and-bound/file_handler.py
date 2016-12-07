from matplotlib import pyplot

import matplotlib.tri as tri

# file_tsp = file('TSP225_TSP_20.txt', 'r')
file_tsp = file('gr666_10.tsp', 'r')


x = []
y = []
label = []

first = 1
def get_maps():
    maps = []

    for data in file_tsp:
        temp = [ float(i.rstrip()) for i in data.split(' ')]
        x.append(temp[1])
        y.append(temp[2])
        label.append(temp[0])
        maps.append(temp)

    return maps

get_maps()

pyplot.plot(x, y,'-o')
for label, x, y in zip(label, x, y):
    pyplot.annotate(
        label,
        xy = (x, y)
    )

# triangles = tri.Triangulation(x, y)
# pyplot.triplot(triangles)

pyplot.show()