
class PushDownAutomata:

    states = ['q1', 'q2', 'q3', 'q4']

    initial_state = 'q1'
    final_state = 'q4'

    input_symbol = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]


    def __init__(self):
        self.stack = []
        self.current_state = self.initial_state


    def evaluate(self, input_tape, debug=False, verbose=False):

        print 'input tape : ', input_tape

        if verbose:
            print 'state :', self.current_state
            print 'stack :', self.stack

        top = 0

        # from q1 go to state q2
        self.stack.insert(0, '#')
        self.current_state = 'q2'

        if verbose:
            print 'state :', self.current_state
            print 'stack :', self.stack

        # from q2 go to state q3
        self.stack.insert(0, 'S')
        self.current_state = 'q3'

        if verbose:
            print 'state :', self.current_state
            print 'stack :', self.stack

        i = 0

        for symbol in input_tape:

            # preposition (p,q,r,s) handler # Tested by Kinto_D
            if symbol == 1:

                if debug:
                    print "process 1"

                # POP S
                if self.stack[top] == 'S':
                    self.stack.pop(0)
                else:
                    if debug:
                        print "error : process 1 - pop S - ", self.stack[top]

                # PUSH A 1
                self.stack.insert(0, 'A')
                self.stack.insert(0, '1')

                # POP 1
                if self.stack[top] == '1':
                    self.stack.pop(0)
                else:
                    if debug:
                        print "error : process 1 - pop 1 - ", self.stack[top]


                # POP A
                if self.stack[top] == 'A':
                    try:
                        next_tape = input_tape[i + 1]

                        # pop 'A' if one prepotion
                        if len(input_tape) == 1:
                            self.stack.pop(0)

                        # don't pop if next tape is and, or, xor, and iff
                        elif next_tape == 3 or next_tape == 4 or next_tape == 5 or next_tape == 8:
                            # print 'not pop A (1)'
                            pass

                        elif next_tape != 7 and next_tape != 10:

                            # print 'not pop A (2)'
                            pass


                        else:
                            self.stack.pop(0)


                    except:
                        self.stack.pop(0)

                    # print "process stack A"

            # not handler - Tested by Kinto D
            elif symbol == 2:

                if debug:
                    print "process 2"

                # POP S
                if self.stack[top] == 'S':
                    self.stack.pop(0)
                else:
                    if debug:
                        print "error : process 2 - pop S - ", self.stack[top]

                # 2 1
                self.stack.insert(0, 'S')
                self.stack.insert(0, '2')

                # pop 2
                if self.stack[top] == '2':
                    self.stack.pop(0)
                else:
                    if debug:
                        print "error : process 2 - pop 2 - ", self.stack[top]

            # and handler - tested by kinto_D
            elif symbol == 3:

                if debug:
                    print "process 3"

                # pop A
                if self.stack[top] == 'A':
                    self.stack.pop(0)
                else:
                    if debug:
                        print "error : process 3 - pop A - ", self.stack[top]

                # push 3 S
                self.stack.insert(0, 'S')
                self.stack.insert(0, '3')

                # pop 3
                if self.stack[top] == '3':
                    self.stack.pop(0)
                else:
                    if debug:
                        print "error : process 3 - pop 3 - ", self.stack[top]

            # or handler - tested by kinto_D
            elif symbol == 4:

                if debug:
                    print "process 4"

                # pop A
                if self.stack[top] == 'A':
                    self.stack.pop(0)
                else:
                    if debug:
                        print "error : process 4 - pop A - ", self.stack[top]

                # push 4 S
                self.stack.insert(0, 'S')
                self.stack.insert(0, '4')

                # pop 4
                if self.stack[top] == '4':
                    self.stack.pop(0)
                else:
                    if debug:
                        print "error : process 4 - pop 4 - ", self.stack[top]

            # xor handler - tested by kinto_D
            elif symbol == 5:

                if debug:
                    print "process 5"

                # pop A
                if self.stack[top] == 'A':
                    self.stack.pop(0)
                else:
                    if debug:
                        print "error : process 5 - pop A - ", self.stack[top]

                # push 4 S
                self.stack.insert(0, 'S')
                self.stack.insert(0, '5')

                # pop 4
                if self.stack[top] == '5':
                    self.stack.pop(0)
                else:
                    if debug:
                        print "error : process 5 - pop 5 - ", self.stack[top]

            # if handler
            elif symbol == 6:

                if debug:
                    print "process 6"

                # POP S
                if self.stack[top] == 'S':
                    self.stack.pop(0)
                else:
                    if debug:
                        print "error : process 6 - pop S - ", self.stack[top]

                self.stack.insert(0, 'S')
                self.stack.insert(0, '7')
                self.stack.insert(0, 'S')
                self.stack.insert(0, '6')

                # POP S
                if self.stack[top] == '6':
                    self.stack.pop(0)
                else:
                    if debug:
                        print "error : process 6 - pop 6 - ", self.stack[top]


            # else handler
            elif symbol == 7:

                if debug:
                    print "process 7"

                if self.stack[top] == '7':
                    self.stack.pop(0)
                else:
                    if debug:
                        # print self.stack
                        print "pop 7 error", self.stack[top]


            # iff handler - tested by kinto_D
            elif symbol == 8:

                if debug:
                    print "process 8"

                # pop A
                if self.stack[top] == 'A':
                    self.stack.pop(0)
                else:
                    if debug:
                        print "error : process 8 - pop A - ", self.stack[top]

                # push 4 S
                self.stack.insert(0, 'S')
                self.stack.insert(0, '8')

                # pop 4
                if self.stack[top] == '8':
                    self.stack.pop(0)
                else:
                    if debug:
                        print "error : process 8 - pop 8 - ", self.stack[top]

            # delimiter "("  handler, tested by kinto d
            elif symbol == 9:

                if debug:
                    print "process 9"

                # POP S
                if self.stack[top] == 'S':
                    self.stack.pop(0)
                else:
                    if debug:
                        print "error : process 9 - pop S - ", self.stack[top]

                self.stack.insert(0, '10')
                self.stack.insert(0, 'S')
                self.stack.insert(0, '9')

                # POP S
                if self.stack[top] == '9':
                    self.stack.pop(0)
                else:
                    if debug:
                        print "error : process 9 - pop S - ", self.stack[top]

            # delimiter ")"  handler, tested by kinto d
            elif symbol == 10:

                if debug:
                    print "process 10"

                if self.stack[top] == '10':
                    self.stack.pop(0)
                else:
                    if debug:
                        print "pop 10 error", self.stack[top]

            # False handler
            else:

                if debug:
                    print 'invalid process (FALSE Detected)'

                return "invalid"


            i += 1

            if verbose:
                print 'state :', self.current_state
                print 'stack :', self.stack
        # end for loop

        # pop (#)
        self.stack.pop(0)
        self.current_state = "q4"

        if verbose:
            print 'state :', self.current_state
            print 'stack :', self.stack

        if len(self.stack) == 0 and self.current_state == self.final_state:
            return "valid"
        else:
            return "invalid"

