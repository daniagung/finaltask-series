import math
import file_handler
import itertools
import time

start = time.time()

graph = file_handler.get_maps()
start_point = graph[0]
graph = graph[1:]


def euclidean_distance(node_1, node_2):
    return math.sqrt((node_1[1]-node_2[1]) ** 2 + (node_1[2]-node_2[2]) ** 2)


lower_bound = 9999999999999
best_path = []

# Generate All Permutation

for solution in itertools.permutations(graph):

    i = 0
    is_solution = True
    distance = euclidean_distance(start_point, solution[i])

    # Kondisi Bound
    if distance > lower_bound:
        is_solution = False
        continue

    while i < len(solution) - 1:
        distance += euclidean_distance(solution[i], solution[i+1])
        i += 1

        # Kondisi Bound
        if distance > lower_bound:
            is_solution = False
            break


    distance += euclidean_distance(solution[i], start_point)

    if is_solution:
        if distance < lower_bound:
            lower_bound = distance
            best_path = solution
            print solution, round(distance,2)


end = time.time()
print "\nprocessing time :", (end - start)
print best_path, lower_bound