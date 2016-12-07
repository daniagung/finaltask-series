import token


def state_preposisi(chars):
    if (len(chars) > 1) :
        return False
    elif chars == token.lexic[0] or chars == token.lexic[1] or chars == token.lexic[2] or chars == token.lexic[3] :
        return token.lexic_token[chars]
    else :
        return False


def state_not(chars):
    i = 0
    check = True
    while i < len(token.lexic[4]) or i < len(chars):
        try:
            if not chars[i] == token.lexic[4][i]:
                check = False
        except IndexError:
            check = False

        i += 1

    if check:
        return token.lexic_token[chars]
    else:
        return False


def state_and(chars):
    i = 0
    check = True
    while i < len(token.lexic[5]) or i < len(chars):
        try:
            if not chars[i] == token.lexic[5][i]:
                check = False
        except IndexError:
            check = False

        i += 1

    if check:
        return token.lexic_token[chars]
    else:
        return False


def state_or(chars):
    i = 0
    check = True
    while i < len(token.lexic[6]) or i < len(chars):
        try:
            if not chars[i] == token.lexic[6][i]:
                check = False
        except IndexError:
            check =False

        i += 1
    if check:
        return token.lexic_token[chars]
    else:
        return False


def state_xor(chars):
    i = 0
    check = True
    while i < len(token.lexic[7]) or i < len(chars):
        try:
            if not chars[i] == token.lexic[7][i]:
                check = False
        except IndexError:
            check = False

        i += 1
    if check:
        return token.lexic_token[chars]
    else:
        return False


def state_if(chars):
    i = 0
    check = True
    while i < len(token.lexic[8]) or i < len(chars):
        try:
            if not chars[i] == token.lexic[8][i]:
                check = False
        except IndexError:
            check = False

        i += 1
    if check:
        return token.lexic_token[chars]
    else:
        return False


def state_then(chars):
    i = 0
    check = True
    while i < len(token.lexic[9]) or i < len(chars):
        try:
            if not chars[i] == token.lexic[9][i]:
                check = False
        except IndexError:
            check = False

        i += 1

    if check:
        return token.lexic_token[chars]
    else:
        return False


def state_iff(chars):
    i = 0
    check = True
    while i < len(token.lexic[10]) or i < len(chars):
        try:
            if not chars[i] == token.lexic[10][i]:
                check = False
        except IndexError:
            check = False

        i += 1

    if check:
        return token.lexic_token[chars]
    else:
        return False


def state_delimiter(chars):

    idx_group = 0
    check = False

    while idx_group < len(token.lexic_group) and not check:
        i = 0
        while i < len(token.lexic_group[idx_group]) or i < len(chars):
            try:
                if chars[i] == token.lexic_group[idx_group][i]:
                    check = True
            except IndexError:
                check = False

            i += 1

        idx_group += 1

    if check:
        return token.lexic_group_token[chars]
    else:
        return False


def get_token(preposition):
    lexics = preposition.split()
    tokens = []

    for prep in lexics:
        if state_preposisi(prep):
            tokens.append(state_preposisi(prep))
        elif state_not(prep):
            tokens.append(state_not(prep))
        elif state_and(prep):
            tokens.append(state_and(prep))
        elif state_or(prep):
            tokens.append(state_or(prep))
        elif state_xor(prep):
            tokens.append(state_xor(prep))
        elif state_if(prep):
            tokens.append(state_if(prep))
        elif state_then(prep):
            tokens.append(state_then(prep))
        elif state_iff(prep):
            tokens.append(state_iff(prep))
        elif state_delimiter(prep):
            tokens.append(state_delimiter(prep))
        else:
            tokens.append(False)

    return tokens
