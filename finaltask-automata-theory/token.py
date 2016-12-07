
lexic = ['p', 'q', 'r', 's', 'not', 'and', 'or',  'xor', 'if', 'then', 'iff']

lexic_group = ['(', ')']

lexic_token = {
    'p': 1, 'q': 1, 'r': 1, 's': 1,
    'not': 2, 'and': 3, 'or': 4, 'xor': 5,
    'if': 6, 'then': 7, 'iff': 8
}

lexic_group_token = {
    '(': 9,
    ')': 10
}

