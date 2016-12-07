from genetic_algorithm import *


def main():

    # Bangkitkan Populasi Awal
    total_populasi = 100

    first_generation = insialisasi_populasi(total_populasi)

    max_generation = 10
    current_gen = 1
    generation = first_generation

    individu_solution = None

    # kriteria penghentian dengan memberikan batasan jumlah iterasi
    # sumber AI Suyanto Bab 5 Learning hal 220
    while current_gen <= max_generation:

        # Menghitung Nilai Fitness setiap Individu
        temp_gen = []
        for individu in generation:

            # calculate fitness attribute in individu
            indv_with_fitness = fitness(individu)
            temp_gen.append(indv_with_fitness)
        generation = temp_gen

        # Elitisme 2 Individu (Ambil 2 Individu Terbaik)
        elite_individu = sorted(generation, key=lambda x: x.nilai_fitness, reverse=True)[:2]

        # Bangun N-2 Populasi Baru (sisa 2 slot untuk elite indvidu)
        # dari merekombinasi dua indvidu terpilih sebagai orang tua
        new_generation = []
        i = 0
        while i < (total_populasi - 2) / 2:

            # Pilih 2 Individu sebagai orang tua
            parent_1 = seleksi_orang_tua(generation)
            parent_2 = seleksi_orang_tua(generation)

            # Rekombinasi 2 Orang tua untuk melahirkan indvidu baru
            childs = rekombinasi(parent_1, parent_2)
            # Mutasi Ke-2 anak
            child_1 = mutation(childs[0])
            child_2 = mutation(childs[1])

            # tambahkan individu baru, ke generasi baru
            new_generation.append(child_1)
            new_generation.append(child_2)

            i += 1

        # Tambahkan Elite Individu ke generasi baru
        new_generation = new_generation + elite_individu

        # Ganti Populasi Generasi Lama, dengan Generasi Baru
        generation = new_generation

        # Output Tiap Generasi
        print "Generation ke :", current_gen
        print "Best Route :", elite_individu[0].solution
        print "Cost Route :", elite_individu[0].waktu_tempuh
        print "Best Fitness:", elite_individu[0].nilai_fitness, "\n"

        individu_solution = elite_individu[0]
        current_gen += 1


    # Output Solution
    print "Solution Tugas GA"
    print "Route Solution :", individu_solution.solution
    print "Cost Solution :", individu_solution.waktu_tempuh, "Menit "
    print "Fitness Solution :", individu_solution.nilai_fitness


if __name__ == "__main__":
    main()


# Notes :
# Tugas Mencari Path dengan sedikit node seperti ini terlalu "overkill" kalo pake Genetic Algorithm
# Buktinya dengan 100 individu, pada generasi pertama saja sudah dapet nilai optimum wkwkwk