import random
import data_handler

map_data = data_handler.convert_to_minute(data_handler.raw)
INDEX = {
    'A': 1, 'B': 2, 'C': 3, 'D': 4, 'E': 5, 'F': 6
}


class Individu():
    nilai_fitness = 0
    waktu_tempuh = 0

    # ex: [a,b,c,d,e,f], S & G, tidak perlu direpresentasikan
    # kromosom diubah menjadi 5 kali lipat dari semula untuk menghindari rute yang tidak valid
    len_chromosome = 6 * 5
    chromosome = []

    solution = []


def generate_chromosome():
    temp = []
    for i in range(6 * 5):
        temp.append(random.choice("ABCDEF"))
    return temp


def fitness(individu):
    value = 0
    position = 0
    solution = []

    for gen in individu.chromosome:
        town_key = INDEX[gen]

        if map_data[position][town_key] != 0 and gen not in solution:
            value += map_data[position][town_key]
            position = town_key
            solution.append(gen)

        # sudah ada di posisi e, f, atau g
        if position > 3:
            break


    # Cek Apakah bisa sampai tujuan (goal state)?
    if position < 4:
        # Berikan nilai fitness yang jelek apabila rute tidak valid
        # Kemungkinan sangat kecil karena kromosom telah diperpanjang 5 kali lipat untuk menghindari rute yang tidak valid
        value = 1000
    else:
        value += map_data[position][7]

    # Nilai Fitness = 1 / waktu tempuh (h)
    individu.nilai_fitness = float(1) / value

    # Isi Solusi & Waktu tempuh
    solution.insert(0, 'S')
    solution.append('G')
    individu.solution = solution
    individu.waktu_tempuh = value

    return individu


# Rekombinasi satu titik (1-point crossover)
def rekombinasi(parent1, parent2):
    chromosome_parent_1 = parent1.chromosome # ex : [a,c,e,d,f,a,b,.........]
    chromosome_parent_2 = parent2.chromosome # ex : [.........,c,d,a,f,a,b,e]

    # new chromosome = [a,c,e,d,f,a ...., | ....,c,d,a,f,a,b,e]
    # 1 point crossover pada titik tengah
    new_chromosome_1 = chromosome_parent_1[:15] + chromosome_parent_2[15:]
    new_chromosome_2 = chromosome_parent_1[15:] + chromosome_parent_2[:15]

    # make new individu
    child_1 = Individu()
    child_1.chromosome = new_chromosome_1
    child_2 = Individu()
    child_2.chromosome = new_chromosome_2
    return [child_1, child_2]


# Mutasi dengan pengacakan nilai gen
def mutation(individu):
    current_chromosome = individu.chromosome
    probabilty_mutation = float(1) / len(current_chromosome)

    # pada setiap gen, apabila bilangan acak yang dibangkitkan kurang dari (Pmut)
    # maka ubah gen menjadi nilai kebalikanya
    i = 0
    while i < len(current_chromosome):

        # Bangkitkan bilangan acak 1 sd 5
        random_num = random.uniform(0, 1)

        if random_num < probabilty_mutation:

            # replace gen pada chromosome dengan kebalikanya
            # ex : jika "A" maka ganti dengan sembarang "B,C,D,E,F"

            current_gen = current_chromosome[i]
            random_gen = random.choice("ABCDEF".replace(current_gen,""))
            current_chromosome[i] = random_gen

        i += 1

    # replace with new chromosome
    individu.chromosome = current_chromosome
    return individu


# Seleksi Orang Tua dengan Roulette Wheel
def seleksi_orang_tua(populasi):

    # Menghitung jumlah nilai fitness
    total_fitness = 0
    for i in populasi:
        total_fitness += i.nilai_fitness

    # Bangkitkan bilangan acak dari 0 s.d total fitness
    random_num = random.uniform(0, total_fitness)
    current = 0
    index = 0
    for indvidu in populasi:
        current += indvidu.nilai_fitness

        # Pilih Individu untuk jadi orang tua,
        if current > random_num:

            # print "random number", random_num
            # print "fitness terpilih", indvidu.nilai_fitness
            # print "index", index

            return indvidu

        index += 1


def insialisasi_populasi(total):
    populasi = []
    for i in range(total):
        # Bangkitkan & Generate Kromosom Acak tiap Individu
        individu = Individu()
        individu.chromosome = generate_chromosome()
        populasi.append(individu)

    return populasi



## Testing Fungsi Fitness
# individu = Individu()
# individu.chromosome = generate_chromosome()
# individu = fitness(individu)
# print individu.chromosome
# print individu.solution
# print individu.nilai_fitness
# print individu.waktu_tempuh


## Testing Fungsi Rekombinasi
# parent_1 = Individu()
# parent_1.chromosome = generate_chromosome()
# parent_1 = fitness(parent_1)
# print parent_1.chromosome, parent_1.nilai_fitness
# parent_2 = Individu()
# parent_2.chromosome = generate_chromosome()
# parent_2 = fitness(parent_2)
# print parent_2.chromosome, parent_2.nilai_fitness
#
# child = rekombinasi(parent_1, parent_2)
# child = fitness(child)
# print child.chromosome, child.nilai_fitness
# print child.solution


## Testing Mutation
# ind = Individu()
# ind.chromosome = generate_chromosome()
# print ind.chromosome
# ind = mutation(ind)
# print ind.chromosome


## Testing Roulette Wheel
# populasi = insialisasi_populasi(100)
# new_pop = []
# # evaluasi nilai fitness
# for i in populasi:
#     i = fitness(i)
#     # print i.nilai_fitness
#     new_pop.append(i)
#
# parent_selected = seleksi_orang_tua(new_pop)