# Import File
import k_near_neighbor

# Built in Library
import csv

# Load Data Train 90000 ada Y-nya
data_train_dir = 'input_file/data_train.csv'
data_train = k_near_neighbor.load_data(data_train_dir)


def main():

    print "Finaltask Artificial Intelligence 2016\n" \
          "Binary Classification with KNN \n" \
          "Menu Classify : \n" \
          "1. Input Console \n" \
          "2. Hardcode Test Data \n" \
          "3. Input File (folder input_file)"

    option = raw_input("Option : ")
    print ""

    # Input test data
    if option == "1":

        print "Sample : -0.5,3,-0.45,-0.06,0.28,-0.44,0.32,2,-0.45,1"
        data_test = raw_input("Input Data : ").split(',')
        data_test = [float(i) for i in data_test]

        # Input K
        k = input("Input K : ")

        print "Prediction :", k_near_neighbor.classify(k,data_test, data_train)

    # Hardcode Test Data
    elif option == "2":

        data_test = [-0.5,3,-0.45,-0.06,0.28,-0.44,0.32,2,-0.45,1]  # len == 10
        print "Data Sample :", data_test

        # Input K
        k = input("Input K : ")

        print "Prediction :", k_near_neighbor.classify(k,data_test, data_train)

    # Test Data Using CSV
    elif option == "3":

        valid = 0
        non_valid = 0

        # Load Data Test
        data_test_dir = 'input_file/data_test.csv'
        data_test = k_near_neighbor.load_data(data_test_dir)

        # Save File to CSV
        output_file_dir = "output_file/output_data_test.csv"
        file_csv = open(output_file_dir, 'wb')
        writer = csv.writer(file_csv, delimiter=',')

        print "Data Test :", data_test_dir
        print "Output Prediction Data Test :", output_file_dir

        # write header for test
        writer.writerow(['ID','x1','x2','x3','x4','x5','x6','x7','x8','x9','x10', 'prediction'])

        # write header for train
        # writer.writerow(['ID','x1','x2','x3','x4','x5','x6','x7','x8','x9','x10', 'y', 'prediction'])

        # Input K
        k = input("Input K : ")

        for data in data_test:

            # duplicate each data train for save/print purposes
            print_data = list(data)

            # only x1-x10 data in list (uncomment remove col y if prediction data testing)
            data.pop(0)  # remove column id
            # test_label = data.pop()  # remove column y

            # KNN Classify Process
            classify_label = k_near_neighbor.classify(k, data, data_train)

            # Debug the data
            print print_data, "Prediction :", classify_label

            # Save to CSV
            print_data.append(classify_label)
            writer.writerow(print_data)

            # counter accuration data
            # if test_label == classify_label:
            #    valid += 1
            # else:
            #    non_valid += 1

        # print "Total Akurasi :", float(valid) / (valid + non_valid) * 100, "%"
        print "Predicting Data Completed"
        print "Ouput File :", output_file_dir

    # wrong option main menu
    else:
        print "Wrong option"


if __name__ == '__main__':

    # run the main function
    main()

