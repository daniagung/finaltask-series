import csv
import math
from operator import itemgetter


def load_data(filename):
    data = []
    with open(filename, 'rb') as f:
        reader = csv.reader(f)
        next(reader, None)  # skip header
        for row in reader:

            # change type data to float (using list comprehension)
            data.append([float(i) for i in row])

    return data


def euclid_distance(data1, data2):
    # input data1 = [ID,x1,..,x10,y] #data training
    # input data2 = [x1,..,x10] # data prediksi
    length = len(data2)
    i = 0
    distance = 0
    while i < length:
        # print data1[i+1], " - " , data2[i]
        distance += (data1[i+1] - data2[i]) ** 2
        i += 1

    return math.sqrt(distance)


def classify(k, test_data, data_train, debug=False):

    # test_data = [x1,..,x10], data yang akan prediksi

    # data_train = list of [ID, x1,..,x10, y]

    # list all neighbor
    nn_list = []

    # count all neighbor distance
    i = 0

    # looping 90000 rb kali
    for data in data_train:
        distance = euclid_distance(data, test_data)
        label = data[-1]
        nn_list.append([distance, label])

    # neighbour list, sort by distance
    # nn_list = [
    #   [distance,label],
    #   [20,0]
    # ]

    k_list = sorted(nn_list, key=itemgetter(0))[:k]

    label_true = 0
    label_false = 0

    # count majority label
    for data in k_list:
        if data[1] == 0:
            label_false += 1
        elif data[1] == 1:
            label_true += 1
        else:
            # Something bad happening
            print "Miss calculation happened"
            raise Exception

    if debug:
        print "Label True :", label_true, " Label False :", label_false

    if label_true == label_false:
        if debug:
            print test_data, ": None"
        return None

    elif label_true > label_false:
        if debug:
            print test_data, ": 1"
        return 1

    elif label_false > label_true:
        if debug:
            print test_data, ": 0"
        return 0
