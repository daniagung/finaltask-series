# Data Raw berdasarkan soal UTS tiap node [jarak, max kecepatan yang dapat ditempuh]
raw = [
    #   S,         A,        B,        C,        D,        E,        F,        G
    [   0,     [ 6, 90], [14, 70], [10, 60],     0,        0,        0,        0      ], #S
    [[ 6, 90],     0,    [ 4, 40],     0,     [16, 40],    0,        0,        0      ], #A
    [[14, 70], [ 4, 40],     0,    [ 4, 90],     0,     [15, 60],    0,        0      ], #B
    [[10, 60],     0,    [ 4, 80],     0,        0,        0,     [12, 40],    0      ], #C
    [   0,     [16, 40],     0,        0,        0,     [4, 120],    0,     [ 9, 70]  ], #D
    [   0,         0,    [15, 60],     0,     [4, 120],     0,    [ 4, 70], [ 9, 80]  ], #E
    [   0,         0,        0,    [12, 40],     0,     [ 4, 70],    0,     [ 6, 40]  ], #F
    [   0,         0,        0,        0,     [ 9, 70], [ 9, 80], [ 6, 40],    0      ], #G
]


def convert_to_minute(graph_data):
    data = []
    for row in graph_data:
        cell_column = []
        for cell in row:
            if cell == 0:
                cell_column.append(0)
            else:
                jarak_km = cell[0]
                max_kecepatan = cell[1]

                # Mobil hasan tidak bisa melaju lebih dari 60km / jam
                # Keterangan : tertera pada soal UTS
                if max_kecepatan > 60:
                    max_kecepatan = 60

                m_per_minute = float(jarak_km) / max_kecepatan * 60
                cell_column.append(int(m_per_minute))

        data.append(cell_column)

    return data

# Hasil Konvert Data RAW ke Menit (Info Debug)
#s, a, b, c, d, e, f, g
'''
s = [ 0,  6, 14, 10,  0,  0,  0, 0]
a = [ 6,  0,  6,  0, 24,  0,  0, 0]
b = [14,  6,  0,  4,  0, 15,  0, 0]
c = [10,  0,  4,  0,  0,  0, 18, 0]
d = [ 0, 24,  0,  0,  0,  4,  0, 9]
e = [ 0,  0, 15,  0,  4,  0,  4, 9]
f = [ 0,  0,  0, 18,  0,  4,  0, 9]
g = [ 0,  0,  0,  0,  9,  9,  9, 0]
'''
